<?php

namespace App\Http\Controllers;

use App\Models\UsersTransaction;
use App\Models\UsersGadget;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use App\Notifications\UserNotification;

class UsersTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        request()->validate(['type' => 'required|string|in:seller,buyer']);
        $transactions = UsersTransaction::where(request()->query('type').'_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')->get();
        return view('user_transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsersTransaction  $usersTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(UsersTransaction $transaction)
    {
        //
        return view('user_transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersTransaction  $usersTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersTransaction $usersTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersTransaction  $usersTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersTransaction $usersTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersTransaction  $usersTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersTransaction $usersTransaction)
    {
        //
    }



    // ==================================================
    public function payment_status(Request $request, UsersTransaction $transaction)
    {
        //
        $request->validate(['status'=>'required|string|in:success,failed']);
        if ($transaction->payment->status == 'pending') {
            $transaction->payment =  (object)[
                'id' => $transaction->payment->id,
                'status' => $request->status,
                'method' => $transaction->payment->method,
                'type' => $transaction->payment->type,
                'checkout_url' => $transaction->payment->checkout_url
            ];
            $transaction->save();

            if ($request->status == 'success') {
                if ($transaction->payment->method) {
                    $response = Http::withBody(
                        '{
                            "data":{
                                "attributes":{
                                    "amount":'.($transaction->price*100).',
                                    "source":{
                                        "id":"'.$transaction->payment->id.'",
                                        "type":"source"
                                    },
                                    "currency":"PHP",
                                    "description":"'.$transaction->code.'"
                                }
                            }
                        }',
                        'application/json'
                    )
                    ->accept('application/json')
                    ->withBasicAuth('sk_test_JA2xSVCAPbUNXaa1uWajZQnc', '')
                    ->post('https://api.paymongo.com/v1/payments');
                }

                $transaction->seller->notify(new UserNotification([
                    'transaction_id' => $transaction->id,
                    'type' => 'transaction',
                    'link' => route('transaction.show', $transaction),
                    'message' => Auth::user()->name->full.' successfully purchased '.
                        $transaction->info->name,
                ]));
                $transaction->gadget->decrement('qty');
                if ($transaction->method == 'offer') {
                    $transaction->offer->status = 'successful';
                    $transaction->offer->save();
                }
            } else {
                $transaction->delete();
            }

            return view('user_transaction.show_payment_status', compact('transaction'));
        } else {
            return back()->withErrors('Something went wrong.');
        }
    }

    public function transaction_post(Request $request, UsersGadget $gadget)
    {
        //
        $request->validate([
            'code' => 'required|string',
            'method' => 'required|string',
            'payment' => 'required|string',
            'payment_amount' => 'required|string',
        ]);

        if ($request->method == 'bid')
            $bid = $gadget->offers->where('status', 'accepted')->first();
        else 
            $bid = (object)['id' => null];

        if ($request->method == 'offer')
            $offer = $gadget->offers->where('status', 'accepted')->first();
        else 
            $offer = (object)['id' => null];

        if ($request->method == 'bid') {
            $price = 0;
        }
        elseif ($request->method == 'offer') {
            $price = $gadget->offers->where('status', 'accepted')->first();
            $price = $price->amount;
        }
        else {
            $price = $gadget->price_selling;
        }

        $transaction = new UsersTransaction;
        $transaction->code = $request->code;
        $transaction->info = $gadget;
        $transaction->price = $price;
        $transaction->method = $request->method;
        $transaction->payment = (object)[
            'id' => null,
            'status' => 'pending',
            'method' => $request->payment,
            'type' => $request->payment_amount,
            'checkout_url' => null
        ];
        $transaction->bid_id = $bid->id;
        $transaction->offer_id = $offer->id;
        $transaction->gadget_id = $gadget->id;
        $transaction->seller_id = $gadget->user_id;
        $transaction->buyer_id = Auth::user()->id;
        $transaction->save();

        if ($request->payment == 'gcash') {
            $response = Http::withBody(
                '{
                    "data": {
                        "attributes": {
                            "amount":'.($price*100).',
                            "redirect": {
                                "success":"'.route('transaction.payment_status', [$transaction, 'status'=>'success']).'",
                                "failed":"'.route('transaction.payment_status', [$transaction, 'status'=>'failed']).'"
                            },
                        "type":"gcash",
                        "currency":"PHP"
                        }
                    }
                }',
                'application/json'
            )
            ->accept('application/json')
            ->withBasicAuth('sk_test_JA2xSVCAPbUNXaa1uWajZQnc', '')
            ->post('https://api.paymongo.com/v1/sources');

            $request_url = $response->object()->data->attributes->redirect->checkout_url;

            $transaction->payment = (object)[
                'id' => $response->object()->data->id,
                'status' => $transaction->payment->status,
                'method' => $transaction->payment->method,
                'type' => $transaction->payment->type,
                'checkout_url' => $request_url
            ];
            $transaction->save();
        } else {
            $request_url = route('transaction.payment_status',
                [$transaction, 'status'=>'success']);
        }

        return response()->json([
            'link' => $request_url
        ]);
    }
}
