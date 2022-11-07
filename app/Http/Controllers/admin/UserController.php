<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\UsersGadget;
use App\Models\UsersTransaction;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::where('type', '!=', 'disabled')->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
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
            'type' => 'required|in:admin,user',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'username' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $user = new User;
        $user->type = $request->type;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = (object)[
            'full' => $request->firstname.' '.$request->lastname,
            'fname' => $request->firstname,
            'lname' => $request->lastname,
        ];
        $user->phone = '+63'.$request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('admin.user.index')
            ->with('success', 'Successfully created profile.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $gadgets = UsersGadget::where('user_id', $user->id)->get();
        $gadgets_count = UsersGadget::where('user_id', $user->id)->count();
        $transactions_count = UsersTransaction::where('seller_id', $user->id)->count();
        return view('admin.user.show', compact(
            'user',
            'gadgets',
            'gadgets_count',
            'transactions_count'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'status' => 'required|in:enabled,disabled',
        ]);

        $user->status = $request->status;
        $user->save();

        return redirect()->route('admin.user.show', $user)
            ->with('success', 'Successfully '.$request->status.' profile.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->type = 'disabled';
        $user->save();

        return redirect()->route('admin.user.index')
            ->with('success', 'Successfully deleted profile.');
    }
}
