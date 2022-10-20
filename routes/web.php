<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\UsersGadget;
use App\Http\Controllers\AppReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersGadgetController;
use App\Http\Controllers\UsersGadgetsBidController;
use App\Http\Controllers\UsersGadgetsOfferController;
use App\Http\Controllers\UsersMessagesGroupController;
use App\Http\Controllers\UsersMessageController;
use App\Http\Controllers\UsersTransactionController;
use App\Http\Controllers\UsersWishlistController;

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


Route::group(['middleware'=>['guest']], function() {
    Route::get('user/register', [UserController::class, 'register'])
        ->name('user.register');
    Route::post('user/register', [UserController::class, 'register_post'])
        ->name('user.register_post');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('dashboard');
    return redirect('/index');
})->name('dashboard');



Route::get('/home', function () {
    return view('welcome');
});



Route::resource('user', UserController::class);
Route::group(['prefix'=>'', 'as'=>'', 'middleware'=>['auth:sanctum']], function () {
    Route::get('/index', function () {
        $gadgets = UsersGadget::where('user_id', '!=', Auth::user()->id)
            ->where('status', 'available')->where('qty', '>', 0)->get();
        return view('user.index', compact('gadgets'));
    })->name('index');
    Route::get('/settings', function () { return view('user.settings'); })->name('user.settings');
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');

    Route::resource('gadget', UsersGadgetController::class);
    Route::get('gadget/{gadget}/proceed', [UsersGadgetController::class, 'proceed'])
        ->name('gadget.proceed');

    // GADGET TRANSACTION
    Route::resource('transaction', UsersTransactionController::class);
    Route::post('gadget/{gadget}/transaction',[UsersTransactionController::class,
        'transaction'])->name('gadget.transaction');

    // GADGET OFFER
    Route::resource('gadget_offer', UsersGadgetsOfferController::class);
    Route::post('gadget_offer/{gadget_offer}/response',[UsersGadgetsOfferController::class,
        'response'])->name('gadget_offer.response');
    Route::get('gadget/{gadget}/offer/add',[UsersGadgetsOfferController::class, 'add'])
        ->name('gadget.offer.add');
    Route::post('gadget/{gadget}/offer/add',[UsersGadgetsOfferController::class, 'add_post'])
        ->name('gadget.offer.add_post');

    // GADGET BID
    Route::resource('gadget_bid', UsersGadgetsBidController::class);
    Route::get('gadget/{gadget}/bid/add',[UsersGadgetsBidController::class, 'add'])
        ->name('gadget.bid.add');
    Route::post('gadget/{gadget}/bid/add',[UsersGadgetsBidController::class, 'add_post'])
        ->name('gadget.bid.add_post');

    // GADGET MESSAGE
    Route::resource('message', UsersMessageController::class);
    Route::resource('message_group', UsersMessagesGroupController::class);
    Route::get('gadget/{gadget}/message_group', [UsersMessagesGroupController::class, 'message'])
        ->name('message_group');
    Route::post('message_group/{group}/message', [UsersMessageController::class, 'add'])
        ->name('message_group.message.add');

    Route::post('gadget/{gadget}/wishlist', [UsersWishlistController::class, 'add'])
        ->name('gadget.wishlist.add');

    Route::resource('report', AppReportController::class);
    Route::resource('wishlist', UsersWishlistController::class);
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
