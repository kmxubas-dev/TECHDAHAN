<?php

namespace App\Http\Controllers;

use App\Models\UsersTransaction;
use App\Models\UsersGadget;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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

    public function transaction(Request $request, UsersGadget $gadget)
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
        $transaction->payment = $request->payment;
        $transaction->payment_amount = $request->payment_amount; 
        $transaction->bid_id = $bid->id;
        $transaction->offer_id = $offer->id;
        $transaction->gadget_id = $gadget->id;
        $transaction->seller_id = $gadget->user_id;
        $transaction->buyer_id = Auth::user()->id;
        $transaction->save();
        $gadget->decrement('qty');

        if ($request->method == 'offer') {
            $offer->status = 'successful';
            $offer->save();
        }

        return redirect()->route('transaction.show', $transaction)
            ->with('success', 'Successfully purchased product.');
    }
}
