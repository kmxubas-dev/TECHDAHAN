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
        $transactions_sum = UsersTransaction::sum('price');
        $topsellers = User::where('type', 'user')
            ->withCount('ratings')->withCount('transactions')
            ->withSum('ratings', 'rate')->orderBy('ratings_sum_rate', 'DESC')
            ->take(5)->get();
        $sales = [
            'jan' => UsersTransaction::whereMonth('created_at', '01')->sum('price'),
            'feb' => UsersTransaction::whereMonth('created_at', '02')->sum('price'),
            'mar' => UsersTransaction::whereMonth('created_at', '03')->sum('price'),
            'apr' => UsersTransaction::whereMonth('created_at', '04')->sum('price'),
            'may' => UsersTransaction::whereMonth('created_at', '05')->sum('price'),
            'jun' => UsersTransaction::whereMonth('created_at', '06')->sum('price'),
            'jul' => UsersTransaction::whereMonth('created_at', '07')->sum('price'),
            'aug' => UsersTransaction::whereMonth('created_at', '08')->sum('price'),
            'sep' => UsersTransaction::whereMonth('created_at', '09')->sum('price'),
            'oct' => UsersTransaction::whereMonth('created_at', '10')->sum('price'),
            'nov' => UsersTransaction::whereMonth('created_at', '11')->sum('price'),
            'dec' => UsersTransaction::whereMonth('created_at', '12')->sum('price'),
        ];

        // dd($sales);

        return view('admin.index', compact(
            'users_count',
            'gadgets_count',
            'transactions_count',
            'transactions_sum',
            'topsellers',
            'sales'
        ));
    }
}
