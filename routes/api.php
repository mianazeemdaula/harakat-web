<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthCustomerController;
use App\Http\Controllers\Api\AuthRiderController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\RecentProductController;
use App\Http\Controllers\Api\AppContentController;
use App\Http\Controllers\Api\InboxController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\UserController;


Route::get('users/{id}', function ($id) {
    $data = \App\Models\User::find($id)->products;
    $data = \App\Models\Merchant::withinGeoRadius()->get();
     return response()->json($data, 200, [],JSON_PRETTY_PRINT);
});

Route::prefix('customer')->group(function () {
    Route::post('/login', [AuthCustomerController::class,'login']);
    Route::post('/signup', [AuthCustomerController::class,'signup']);
    Route::post('/social', [AuthCustomerController::class,'social']);
    Route::post('/complete-profile', [AuthCustomerController::class,'completeProfile']);

    // Reset Password
    Route::post('/send-reset-pass-pin', [UserController::class,'sendResetPasswordPin']);
    Route::post('/change-password', [UserController::class,'changePassword']);

    Route::post('shops', [HomeController::class,'shops']);
    Route::post('home', [HomeController::class,'home']);
    Route::get('category', [MenuController::class,'categories']);
    Route::get('menus', [MenuController::class,'menus']);
    Route::post('menu-shops', [MenuController::class,'menuShops']);
    Route::post('shop-products', [MenuController::class,'shopProducts']);
    Route::post('popular-products', [MenuController::class,'popularProducts']);
    Route::get('cities', [DataController::class, 'cities']);
    Route::post('offers', [HomeController::class,'offers']);
    Route::get('app-content', [AppContentController::class,'index']);
    
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('recent-products', [HomeController::class,'recentProducts']);
        Route::resource('notification', NotificationController::class);
        Route::resource('order', OrderController::class);
        Route::resource('card', CardController::class);
        Route::resource('inbox', InboxController::class);
        // Route::resource('recent-product', RecentProductController::class);
        Route::get('user/profile', [UserController::class,'profile']);
        Route::post('user/update', [UserController::class,'updateUser']);
        Route::post('user/delete', [UserController::class,'deleteAccount']);
        Route::post('claim', [OfferController::class,'claim']);
        Route::resource('address', AddressController::class);
    });
});

Route::prefix('rider')->group(function () {
    Route::post('/login', [AuthRiderController::class,'login']);
    Route::post('/signup', [AuthRiderController::class,'signup']);
    Route::post('/social', [AuthRiderController::class,'social']);

    Route::middleware(['auth:sanctum'])->group(function () {
        
    });
});

Route::post('auth/{provider}/callback', function (Request $request) {
    return $request->all();
});

Route::get('test/{id}', function($id){
    return \App\Helper\StripePayment::cardPayment(\App\Models\PaymentCard::find($id),intval("23.56") * 100);
});