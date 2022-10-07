<?php

namespace App\Http\Controllers;

use App\Models\UsersMessage;
use App\Models\UsersMessagesGroup;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UsersMessageController extends Controller
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
     * @param  \App\Models\UsersMessage  $usersMessage
     * @return \Illuminate\Http\Response
     */
    public function show(UsersMessage $usersMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersMessage  $usersMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersMessage $usersMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersMessage  $usersMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersMessage $usersMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersMessage  $usersMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersMessage $usersMessage)
    {
        //
    }



    // ==================================================

    public function add(Request $request, UsersMessagesGroup $group)
    {
        //
        $request->validate(['message' => 'required|string']);
        $message = new UsersMessage;
        $message->group_id = $group->id;
        $message->user_id = Auth::user()->id;
        $message->message = $request->message;
        $message->status = 'unread';
        $message->save();

        $group->status = 'unread';
        $group->save();

        return redirect()->route('message_group.show', $group);
    }
}
