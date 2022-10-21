<?php

namespace App\Http\Controllers;

use App\Models\UsersGadgetsRating;
use App\Models\UsersGadget;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UsersGadgetsRatingController extends Controller
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
     * @param  \App\Models\UsersGadgetsRating  $usersGadgetsRating
     * @return \Illuminate\Http\Response
     */
    public function show(UsersGadgetsRating $usersGadgetsRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersGadgetsRating  $usersGadgetsRating
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersGadgetsRating $usersGadgetsRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersGadgetsRating  $usersGadgetsRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersGadgetsRating $usersGadgetsRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersGadgetsRating  $usersGadgetsRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersGadgetsRating $rating)
    {
        //
        $rating->delete();
        return redirect()->route('gadget.show', $rating->gadget_id)
            ->with('success', 'Successfully removed feedback.');
    }



    // ==================================================
    
    public function rate(Request $request, UsersGadget $gadget)
    {
        //
        $rating = UsersGadgetsRating::where('user_id', Auth::user()->id)
            ->where('gadget_id', $gadget->id)->first();
        

        return view('user_gadget_rating.rate', compact('gadget', 'rating'));
    }
    
    public function rate_post(Request $request, UsersGadget $gadget)
    {
        //
        $request->validate([
            'rate' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string',
        ]);
        
        $rating = UsersGadgetsRating::updateOrCreate(
            ['gadget_id' => $gadget->id, 'user_id' => Auth::user()->id],
            [
                'rate' => $request->rate,
                'feedback' => $request->feedback,
                'seller_id' => $gadget->user_id,
            ]
        );

        return redirect()->route('gadget.show', $gadget)
            ->with('success', 'Feedback successfully submitted.');
    }
}
