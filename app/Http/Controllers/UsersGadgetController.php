<?php

namespace App\Http\Controllers;

use App\Models\UsersGadget;
use App\Models\UsersGadgetsRating;
use App\Models\UsersPayment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UsersGadgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gadgets = UsersGadget::where('user_id', Auth::user()->id)->get();
        return view('user_gadget.index', compact('gadgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user_gadget.create');
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
        $request->validate([
            'name' => 'required|string|max:50',
            'qty' => 'required|integer',
            'category' => 'required|string|max:50',
            'description' => 'required|string|nullable',
            'model' => 'required|string|max:50',
            'storage' => 'required|string|max:50',
            'condition' => 'required|string|max:50',
            'method_bid' => 'nullable|in:true',
            'method_offer' => 'nullable|in:true',
            'price_original' => 'required|integer',
            'price_selling' => 'required|integer',
            'installment' => 'required|integer',
            'img_receipt' => 'file',
            'img' => 'required|file'
        ]);

        $gadget = new UsersGadget;
        $gadget->status = 'available';
        $gadget->name = $request->name;
        $gadget->qty = $request->qty;
        $gadget->category = $request->category;
        $gadget->details = (object)[
            'description' => $request->description,
            'model' => $request->model,
            'storage' => $request->storage,
        ];
        $gadget->methods = (object)[
            'bid' => isset($request->method_bid) ? true:false,
            'offer' => isset($request->method_offer) ? true:false,
        ];
        $gadget->installment = (object)[
            'status' => ($request->installment != 0),
            'duration' => (int)$request->installment,
        ];
        $gadget->condition = $request->condition;
        $gadget->price_original = $request->price_original;
        $gadget->price_selling = $request->price_selling;
        $gadget->bidding_min = $request->bidding_min;
        $gadget->bidding_start = $request->bidding_start;
        $gadget->bidding_end = $request->bidding_end;
        $gadget->payment = 'all';
        if($request->hasFile('img_receipt')) {
            $gadget->img_receipt = 'storage/receipts/'.$request->user()->id.'/'.time().'.'
                .$request->file('img_receipt')->getClientOriginalExtension();
            $request->file('img_receipt')->storeAs(
                'public/receipts/'.$request->user()->id, 
                time().'.'.$request->file('img_receipt')->getClientOriginalExtension()
            );
        }
        $gadget->img = 'storage/products/'.$request->user()->id.'/'.time().'.'
            .$request->file('img')->getClientOriginalExtension();
        $request->file('img')->storeAs(
            'public/products/'.$request->user()->id, 
            time().'.'.$request->file('img')->getClientOriginalExtension()
        );
        $gadget->user_id = Auth::user()->id;
        $gadget->save();

        return redirect()->route('gadget.show', compact('gadget'))
            ->with('success', 'Successfully created product.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsersGadget  $usersGadget
     * @return \Illuminate\Http\Response
     */
    public function show(UsersGadget $gadget)
    {
        //
        $gadget->ratings = UsersGadgetsRating::where('gadget_id', $gadget->id)
            ->orderBy('updated_at', 'DESC')->get();
        return view('user_gadget.show', compact('gadget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersGadget  $usersGadget
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersGadget $gadget)
    {
        //
        return view('user_gadget.edit', compact('gadget'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersGadget  $usersGadget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersGadget $gadget)
    {
        //
        $request->validate([
            'status' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'qty' => 'required|integer',
            'category' => 'required|string|max:50',
            'description' => 'required|string|nullable',
            'model' => 'required|string|max:50',
            'storage' => 'required|string|max:50',
            'condition' => 'required|string|max:50',
            'method_bid' => 'nullable|in:true',
            'method_offer' => 'nullable|in:true',
            'price_original' => 'required|integer',
            'price_selling' => 'required|integer',
            'installment' => 'required|integer',
        ]);

        $gadget->status = $request->status;
        $gadget->name = $request->name;
        $gadget->qty = $request->qty;
        $gadget->category = $request->category;
        $gadget->details = (object)[
            'description' => $request->description,
            'model' => $request->model,
            'storage' => $request->storage,
        ];
        $gadget->methods = (object)[
            'bid' => isset($request->method_bid) ? true:false,
            'offer' => isset($request->method_offer) ? true:false,
        ];
        $gadget->installment = (object)[
            'status' => ($request->installment != 0),
            'duration' => (int)$request->installment,
        ];
        $gadget->condition = $request->condition;
        $gadget->price_original = $request->price_original;
        $gadget->price_selling = $request->price_selling;
        $gadget->bidding_min = $request->bidding_min;
        $gadget->bidding_start = $request->bidding_start;
        $gadget->bidding_end = $request->bidding_end;
        $gadget->payment = 'all';
        $gadget->save();

        return redirect()->route('gadget.edit', compact('gadget'))
            ->with('success', 'Successfully edited product.');
        
        // $transaction->tracking_code = 'JOG'.rand(1000, 9999).'-'.strtoupper(substr(md5(microtime()),rand(0,26),4)).'-TST';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersGadget  $usersGadget
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersGadget $gadget)
    {
        //
        $gadget->delete();
        return redirect()->route('gadget.index')->with('success', 'Successfully deleted product.');
    }



    // ==================================================

    public function proceed(UsersGadget $gadget)
    {
        //
        $payments = UsersPayment::where('user_id', Auth::user()->id)->get();
        return view('user_gadget.show_proceed', compact('gadget', 'payments'));
    }
}
