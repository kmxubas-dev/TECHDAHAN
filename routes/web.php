<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\UsersGadget;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AppReportController as Admin_AppReportController;
use App\Http\Controllers\admin\UserController as Admin_UserController;
use App\Http\Controllers\admin\UsersGadgetController as Admin_UsersGadgetController;

use App\Http\Controllers\AppReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersGadgetController;
use App\Http\Controllers\UsersGadgetsBidController;
use App\Http\Controllers\UsersGadgetsOfferController;
use App\Http\Controllers\UsersGadgetsRatingController;
use App\Http\Controllers\UsersMessagesGroupController;
use App\Http\Controllers\UsersNotificationController;
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

Route::get('/home', function () {
    return view('welcome');
});


Route::group(['middleware'=>['guest']], function() {
    Route::get('user/register', [UserController::class, 'register'])
        ->name('user.register');
    Route::post('user/register', [UserController::class, 'register_post'])
        ->name('user.register_post');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('dashboard');
    if (Auth::user()->type == 'admin') {
        return redirect()->route('admin.index');
    }
    return redirect('/index');
})->name('dashboard');



Route::resource('user', UserController::class);
Route::delete('user/{user}', [UserController::class, 'destroy'])
    ->name('user.destroy')->middleware('password.confirm');;
Route::group(['prefix'=>'', 'as'=>'', 'middleware'=>['auth:sanctum', 'verified']], function () {
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
    Route::get('transaction/{transaction}/payment_status',[UsersTransactionController::class,
        'payment_status'])->name('transaction.payment_status');
    Route::post('gadget/{gadget}/transaction',[UsersTransactionController::class,
        'transaction_post'])->name('gadget.transaction_post');

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

    // GADGET WISHLIST
    Route::post('gadget/{gadget}/wishlist', [UsersWishlistController::class, 'add'])
        ->name('gadget.wishlist.add');

    // GADGET RATING
    Route::resource('rating', UsersGadgetsRatingController::class);
    Route::get('gadget/{gadget}/rating', [UsersGadgetsRatingController::class, 'rate'])
        ->name('gadget.rating.rate');
    Route::post('gadget/{gadget}/rating', [UsersGadgetsRatingController::class, 'rate_post'])
        ->name('gadget.rating.rate_post');

    Route::resource('report', AppReportController::class);
    Route::resource('wishlist', UsersWishlistController::class);
    Route::resource('notification', UsersNotificationController::class);
});





// ADMIN ROUTES
Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware'=>['auth:sanctum']], function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('report', Admin_AppReportController::class);
    Route::resource('user', Admin_UserController::class);
    Route::resource('gadget', Admin_UsersGadgetController::class);
    Route::post('gadget/{gadget}/status', [Admin_UsersGadgetController::class, 'status'])
        ->name('gadget.status');
});
