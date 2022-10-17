<?php

namespace App\Http\Controllers;

use App\Models\UsersGadgetsOffer;
use App\Models\UsersGadget;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

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
        request()->validate([
            'type' => 'required|string|in:seller,buyer',
        ]);

        if (request()->query('type') == 'seller') {
            $offers = UsersGadgetsOffer::whereHas('gadget', function (Builder $query) {
                    $query->where('user_id', Auth::user()->id);
                })->where('status', 'pending')->orderBy('updated_at', 'DESC')
                ->with('gadget')->get();
        } else {
            $offers = UsersGadgetsOffer::where('user_id', Auth::user()->id)
                // ->where(function($query) {
                //     $query->where('status', 'pending');
                //     $query->orWhere('status', 'accepted');
                // })
                ->orderBy('updated_at', 'DESC')
                ->with('gadget')->get();
        }

        return view('user_gadget_offer.index', compact('offers'));
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
    public function show(UsersGadgetsOffer $gadget_offer)
    {
        //
        $offer = $gadget_offer;
        $gadget = $gadget_offer->gadget;
        return view('user_gadget_offer.show', compact('offer', 'gadget'));
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
    public function destroy(UsersGadgetsOffer $gadget_offer)
    {
        //
        $gadget_offer->delete();
        return redirect()->route('gadget.show', $gadget_offer->gadget_id)
            ->with('success', 'Successfully cancelled offer.');
    }



    // ==================================================

    public function add(UsersGadget $gadget)
    {
        //
        $offer = UsersGadgetsOffer::where('gadget_id', $gadget->id)
            ->where('user_id', Auth::user()->id)->first();
        if (isset($offer))
            return redirect()->route('gadget_offer.show', $offer);
        else
            return view('user_gadget_offer.show', compact('gadget', 'offer'));
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
            ['status' => 'pending', 'amount' => $request->amount, 'note' => $request->note]
        );

        return redirect()->route('gadget.show', compact('gadget'))
            ->with('success', 'Successfully submitted offer.');
    }

    public function response(Request $request, UsersGadgetsOffer $gadget_offer)
    {
        //
        $request->validate([
            'status' => 'required|string|in:accepted,declined',
        ]);
        $gadget = $gadget_offer->gadget;
        $gadget_offer->status = $request->status;
        $gadget_offer->save();
        if ($request->status == 'accepted') {
            UsersGadgetsOffer::where('gadget_id', $gadget->id)
                ->where('id', '!=', $gadget_offer->id)
                ->update(['status' => 'declined']);
        }

        return redirect()->route('gadget.show', compact('gadget'))
            ->with('success', 'Successfully '.$request->status.' offer.');
    }
}
