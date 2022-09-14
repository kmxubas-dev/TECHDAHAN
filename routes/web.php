<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('dashboard');
    return redirect('/admin');
})->name('dashboard');



Route::get('/home', function () {
    return view('welcome');
});


Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware'=>['auth:sanctum']], function() {
    Route::get('/', function () {
        return view('admin.index');
    });
    // Route::get('/create', function () {
    //     return view('welcome');
    // });
    // Route::get('/create', function () {
    //     return view('welcome');
    // });
    // Route::get('/create', function () {
    //     return view('welcome');
    // });
});
