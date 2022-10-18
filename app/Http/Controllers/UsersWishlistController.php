<?php

namespace App\Http\Controllers;

use App\Models\UsersWishlist;
use App\Models\UsersGadget;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UsersWishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wishlists = UsersWishlist::where('user_id', Auth::user()->id)
            ->with('gadget')->get();
        return view('user_wishlist.index', compact('wishlists'));
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
     * @param  \App\Models\UsersWishlist  $usersWishlist
     * @return \Illuminate\Http\Response
     */
    public function show(UsersWishlist $usersWishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersWishlist  $usersWishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersWishlist $usersWishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersWishlist  $usersWishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersWishlist $usersWishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersWishlist  $usersWishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersWishlist $wishlist)
    {
        //
        $wishlist->delete();
        return redirect()->route('wishlist.index')
            ->with('success', 'Successfully removed from wishlist.');
    }



    // ==================================================
    
    public function add(Request $request, UsersGadget $gadget)
    {
        //
        $wishlist_exist = UsersWishlist::where('user_id', Auth::user()->id)
            ->where('gadget_id', $gadget->id)->count();

        if ($wishlist_exist > 0) {
            return back()->withErrors('Gadget already in the wishlist.');
        }

        $wishlist = new UsersWishlist;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->gadget_id = $gadget->id;
        $wishlist->save();

        return redirect()->route('gadget.show', $gadget)
            ->with('success', 'Gadget added to wishlist.');
    }
}
