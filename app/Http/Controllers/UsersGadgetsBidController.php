<?php

namespace App\Http\Controllers;

use App\Models\UsersGadgetsBid;
use App\Models\UsersGadget;
use Illuminate\Http\Request;

use App\Notifications\UserNotification;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class UsersGadgetsBidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\UsersGadgetsBid  $usersGadgetsBid
     * @return \Illuminate\Http\Response
     */
    public function show(UsersGadgetsBid $usersGadgetsBid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersGadgetsBid  $usersGadgetsBid
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersGadgetsBid $usersGadgetsBid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersGadgetsBid  $usersGadgetsBid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersGadgetsBid $usersGadgetsBid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersGadgetsBid  $usersGadgetsBid
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersGadgetsBid $gadget_bid)
    {
        //
        $gadget_bid->delete();
        return redirect()->route('gadget.show', $gadget_bid->gadget_id)
            ->with('success', 'Successfully cancelled bid.');
    }



    // ==================================================

    public function add(UsersGadget $gadget)
    {
        //
        if (Carbon::parse($gadget->bidding_end)->isPast()) {
            $bid = UsersGadgetsBid::where('gadget_id', $gadget->id)
                ->where('status', '!=', 'winner')
                ->where('status', '!=', 'loser')
                ->orderBy('amount', 'desc')->first();

            if (isset($bid)) {
                $bid->status = 'winner';
                $bid->save();

                $bid->user->notify(new UserNotification([
                    'bid_id' => $bid->id,
                    'type' => 'bid_winner',
                    'link' => route('gadget.bid.add', $gadget),
                    'message' => 'You are the winner of the bid - '.
                        $gadget->name,
                ]));
            }
        }
        $bid = UsersGadgetsBid::where('gadget_id', $gadget->id)
            ->where('user_id', Auth::user()->id)->first();
        $bids = UsersGadgetsBid::where('gadget_id', $gadget->id)
            ->orderBy('amount', 'desc')->take(10)->get();
        return view('user_gadget_bid.add', compact('gadget', 'bid', 'bids'));
    }

    public function add_post(Request $request, UsersGadget $gadget)
    {
        //
        $request->validate([
            'amount' => 'required|numeric'
        ]);

        $similarbids = $gadget->bids->where('amount', $request->amount)
            ->where('user_id', '!=', Auth::user()->id)->count();
    
        if ($request->amount < $gadget->bidding_min) {
            return back()->withErrors('Amount can\'t be lower than minimum bidding value');
        }
        if ($similarbids > 0) {
            return back()->withErrors('Amount already bidded');
        }
        
        if (Carbon::parse($gadget->bidding_end)->isPast()) {
            return back()->withErrors('Bidding time already past.');
        }
        if (Carbon::parse($gadget->bidding_end)->isPast()) {
            return back()->withErrors('Bidding time already past.');
        }

        $offer = UsersGadgetsBid::updateOrCreate(
            ['gadget_id' => $gadget->id, 'user_id' => Auth::user()->id, 'status'=>'pending'],
            ['amount' => $request->amount]
        );

        return redirect()->route('gadget.bid.add', compact('gadget'))
            ->with('success', 'Successfully submitted bid.');
    }
}
