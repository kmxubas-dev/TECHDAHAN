<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\UsersGadget;
use Illuminate\Http\Request;

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
        $gadgets = UsersGadget::paginate(5);
        return view('admin.gadget.index', compact('gadgets'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UsersGadget $gadget)
    {
        //
        return view('admin.gadget.show', compact('gadget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersGadget $gadget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    /* ================================================================================ */

    public function status(Request $request, UsersGadget $gadget)
    {
        //
        $request->validate(['value'=>'required|in:available,unavailable']);

        $gadget->status = $request->value;
        $gadget->save();

        if ($request->value == 'available') {
            return redirect()->route('admin.gadget.show', $gadget)
                ->with('success', 'Successfully enabled gadget.');
        } else {
            return redirect()->route('admin.gadget.show', $gadget)
                ->with('success', 'Successfully disabled gadget.');
        }
    }
}
