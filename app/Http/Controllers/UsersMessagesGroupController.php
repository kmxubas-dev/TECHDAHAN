<?php

namespace App\Http\Controllers;

use App\Models\UsersMessagesGroup;
use App\Models\UsersMessage;
use App\Models\UsersGadget;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UsersMessagesGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $type = request()->query('type');
        $user_type = isset($type) ? $type.'_id':'user_id';
        $groups = UsersMessagesGroup::where($user_type, Auth::user()->id)
            ->orderBy('updated_at', 'desc')
            ->with(['gadget', 'seller', 'messages_latest'])
            ->get();
        return view('user_message.index', compact('groups'));
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
     * @param  \App\Models\UsersMessagesGroup  $usersMessagesGroup
     * @return \Illuminate\Http\Response
     */
    public function show(UsersMessagesGroup $message_group)
    {
        //
        $group = $message_group;
        if (isset($group->messages_latest) && $group->messages_latest->status == 'unread' && 
        $group->messages_latest->user_id != auth()->user()->id) {
            UsersMessage::where('group_id', $group->id)->where('status', 'unread')
                ->update(['status' => 'read']);
        }
        return view('user_message.message', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersMessagesGroup  $usersMessagesGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersMessagesGroup $usersMessagesGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersMessagesGroup  $usersMessagesGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersMessagesGroup $usersMessagesGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersMessagesGroup  $usersMessagesGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersMessagesGroup $usersMessagesGroup)
    {
        //
    }



    // ==================================================

    public function message(UsersGadget $gadget)
    {
        //
        $group = UsersMessagesGroup::updateOrCreate(
            [
                'gadget_id' => $gadget->id,
                'seller_id' => $gadget->user_id,
                'user_id' => Auth::user()->id
            ],
            ['status' => 'active']
        );
        $group->with('messages');

        return redirect()->route('message_group.show', $group);
    }
}
