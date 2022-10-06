<?php

namespace App\Http\Controllers;

use App\Models\UsersGadgetsOffer;
use App\Models\UsersGadget;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UsersGadgetsOfferController extends Controller
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
     * @param  \App\Models\UsersGadgetsOffer  $usersGadgetsOffer
     * @return \Illuminate\Http\Response
     */
    public function show(UsersGadgetsOffer $usersGadgetsOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersGadgetsOffer  $usersGadgetsOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersGadgetsOffer $usersGadgetsOffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersGadgetsOffer  $usersGadgetsOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersGadgetsOffer $usersGadgetsOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersGadgetsOffer  $usersGadgetsOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersGadgetsOffer $usersGadgetsOffer)
    {
        //
    }



    // ==================================================

    public function add(UsersGadget $gadget)
    {
        //
        $offer = UsersGadgetsOffer::where('gadget_id', $gadget->id)
            ->where('user_id', Auth::user()->id)->first();
        return view('user_gadget_offer.add', compact('gadget', 'offer'));
    }

    public function add_post(Request $request, UsersGadget $gadget)
    {
        //
        $request->validate([
            'amount' => 'required|numeric',
            'note' => 'required|string'
        ]);
        $offer = UsersGadgetsOffer::updateOrCreate(
            ['gadget_id' => $gadget->id, 'user_id' => Auth::user()->id],
            ['amount' => $request->amount, 'note' => $request->note]
        );

        return redirect()->route('gadget.show', compact('gadget'))
            ->with('success', 'Successfully submitted offer.');
    }
}
