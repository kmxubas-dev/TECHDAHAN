<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersGadget;
use App\Models\UsersTransaction;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
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
    public function show($id)
    {
        //
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
        if (!auth()->check()) return redirect()->route('login');
        if ($user->id != Auth::user()->id)
            return back()->withErrors('Something went wrong');

        return view('user.profile_edit', compact('user'));
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
        if (!auth()->check()) return redirect()->route('login');
        $request->validate([
            'email' => 'required|unique:users,email,'.$user->id,
            'username' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        if (isset($request->password))
            $request->validate(['password' => 'required|confirmed']);

        if ($user->id != Auth::user()->id)
            return back()->withErrors('Something went wrong');

        $user->email = $request->email;
        if (isset($request->password)) $user->password = Hash::make($request->password);
        $user->name = (object)[
            'full' => $request->firstname.' '.$request->lastname,
            'fname' => $request->firstname,
            'lname' => $request->lastname,
        ];
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        Auth::login($user);

        return redirect()->route('user.profile')
            ->with('success', 'Successfully updated profile.');
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



    // ==================================================
    
    public function register()
    {
        return view('user.auth.register');
    }
    
    public function register_post(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'username' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $user = new User;
        $user->type = 'user';
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = (object)[
            'full' => $request->firstname.' '.$request->lastname,
            'fname' => $request->firstname,
            'lname' => $request->lastname,
        ];
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        Auth::login($user);

        // return view('user.auth.register');
    }
    
    public function profile()
    {
        //
        $gadgets_count = UsersGadget::where('user_id', Auth::user()->id)->count();
        $transactions_count = UsersTransaction::where('seller_id', Auth::user()->id)->count();
        return view('user.profile', compact('gadgets_count', 'transactions_count'));
    }
}
