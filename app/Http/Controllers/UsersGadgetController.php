<?php

namespace App\Http\Controllers;

use App\Models\UsersGadget;
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
            'color' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'storage' => 'required|string|max:50',
            'condition' => 'required|string|max:50',
            'price_original' => 'required|integer',
            'price_selling' => 'required|integer',
            'receipt' => 'required|string|max:50'
        ]);

        $gadget = new UsersGadget;
        $gadget->status = 'available';
        $gadget->name = $request->name;
        $gadget->color = $request->color;
        $gadget->model = $request->model;
        $gadget->storage = $request->storage;
        $gadget->condition = $request->condition;
        $gadget->price_original = $request->price_original;
        $gadget->price_selling = $request->price_selling;
        $gadget->payment = 'cash';
        $gadget->receipt = $request->receipt;
        $gadget->user_id = Auth::user()->id;
        $gadget->save();

        return view('user_gadget.success');
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
            'name' => 'required|string|max:50',
            'color' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'storage' => 'required|string|max:50',
            'condition' => 'required|string|max:50',
            'price_original' => 'required|integer',
            'price_selling' => 'required|integer',
            'receipt' => 'required|string|max:50'
        ]);

        $gadget->status = 'available';
        $gadget->name = $request->name;
        $gadget->color = $request->color;
        $gadget->model = $request->model;
        $gadget->storage = $request->storage;
        $gadget->condition = $request->condition;
        $gadget->price_original = $request->price_original;
        $gadget->price_selling = $request->price_selling;
        $gadget->payment = 'cash';
        $gadget->receipt = $request->receipt;
        $gadget->save();

        return view('user_gadget.success');
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
        return view('user_gadget.success');
    }
}
