<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthCustomerController;
use App\Http\Controllers\Api\AuthRiderController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\NotificationController;


Route::get('users/{id}', function ($id) {
    $data = \App\Models\User::find($id)->products;
    $data = \App\Models\Merchant::withinGeoRadius()->get();
     return response()->json($data, 200, [],JSON_PRETTY_PRINT);
});

Route::prefix('customer')->group(function () {
    Route::post('/login', [AuthCustomerController::class,'login']);
    Route::post('/signup', [AuthCustomerController::class,'signup']);
    Route::post('/social', [AuthCustomerController::class,'social']);

    Route::get('home', [HomeController::class,'index']);
    Route::get('menus', [MenuController::class,'menus']);
    Route::get('cities', [DataController::class, 'cities']);
    Route::post('cat-products', [MenuController::class,'menuProduct']);

    
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::resource('notification', NotificationController::class);
        
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
