<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\UsersGadget;
use App\Http\Controllers\UsersGadgetController;

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
    return redirect('/index');
})->name('dashboard');



Route::get('/home', function () {
    return view('welcome');
});


Route::group(['prefix'=>'', 'as'=>'', 'middleware'=>['auth:sanctum']], function () {
    Route::get('/index', function () {
        $gadgets = UsersGadget::where('user_id', '!=', Auth::user()->id)
            ->where('status', 'available')->get();
        return view('user.index', compact('gadgets'));
    })->name('index');
    Route::get('/settings', function () { return view('user.settings'); })->name('user.settings');

    Route::resource('gadget', UsersGadgetController::class);
    Route::get('gadget/{gadget}/proceed',  [UsersGadgetController::class, 'proceed'])
        ->name('gadget.proceed');
    Route::post('gadget/{gadget}/proceed',  [UsersGadgetController::class, 'proceed_post'])
        ->name('gadget.proceed_post');

    // Route::resource('gadget_bid')
});






// ADMIN ROUTES
Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware'=>['auth:sanctum']], function() {
    Route::get('/', function () {
        return view('admin.index');
    });
    // Route::get('/create', function () {
    //     return view('welcome');
    // });
});
