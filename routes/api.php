<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthCustomerController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users/{id}', function ($id) {
    $data = \App\Models\User::find($id)->products;
     return response()->json($data, 200, [],JSON_PRETTY_PRINT);
});


Route::get('cutomer/login', [AuthCustomerController::class,'login']);
Route::get('cutomer/signup', [AuthCustomerController::class,'signup']);
Route::get('cutomer/social', [AuthCustomerController::class,'social']);

Route::middleware(['auth:sanctum'])->group(function () {
    
});