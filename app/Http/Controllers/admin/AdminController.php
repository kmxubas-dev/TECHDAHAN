<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\UsersGadget;
use App\Models\UsersTransaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users_count = User::count();
        $gadgets_count = UsersGadget::count();
        $transactions_count = UsersTransaction::count();
        return view('admin.index', compact(
            'users_count',
            'gadgets_count',
            'transactions_count'
        ));
    }
}
