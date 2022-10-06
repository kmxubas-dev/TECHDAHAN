<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\UsersGadget;
use App\Http\Controllers\UsersGadgetController;
use App\Http\Controllers\UsersGadgetsBidController;
use App\Http\Controllers\UsersGadgetsOfferController;

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
    Route::get('gadget/{gadget}/proceed', [UsersGadgetController::class, 'proceed'])
        ->name('gadget.proceed');
    Route::post('gadget/{gadget}/proceed', [UsersGadgetController::class, 'proceed_post'])
        ->name('gadget.proceed_post');
    Route::get('gadget/{gadget}/offer/add',[UsersGadgetsOfferController::class, 'add'])
        ->name('gadget.offer.add');
    Route::post('gadget/{gadget}/offer/add',[UsersGadgetsOfferController::class, 'add_post'])
        ->name('gadget.offer.add_post');
    Route::get('gadget/{gadget}/bid/add',[UsersGadgetsBidController::class, 'add'])
        ->name('gadget.bid.add');
    Route::post('gadget/{gadget}/bid/add',[UsersGadgetsBidController::class, 'add_post'])
        ->name('gadget.bid.add_post');

    Route::resource('gadget_bid', UsersGadgetsBidController::class);
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
