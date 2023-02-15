<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthCustomerController;
use App\Http\Controllers\Api\AuthRiderController;


Route::get('users/{id}', function ($id) {
    $data = \App\Models\User::find($id)->products;
     return response()->json($data, 200, [],JSON_PRETTY_PRINT);
});

Route::prefix('customer')->group(function () {
    Route::post('/login', [AuthCustomerController::class,'login']);
    Route::post('/signup', [AuthCustomerController::class,'signup']);
    Route::post('/social', [AuthCustomerController::class,'social']);

    Route::middleware(['auth:sanctum'])->group(function () {
        
    });
});

Route::prefix('rider')->group(function () {
    Route::post('/login', [AuthRiderController::class,'login']);
    Route::post('/signup', [AuthRiderController::class,'signup']);
    Route::post('/social', [AuthRiderController::class,'social']);

    Route::middleware(['auth:sanctum'])->group(function () {
        
    });
});
