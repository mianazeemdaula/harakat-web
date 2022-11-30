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
    return view('loginpages.login');
});
Route::view('step1', 'loginpages.step1');
Route::view('step2', 'loginpages.step2');
Route::view('step3', 'loginpages.step3');
Route::view('login', 'loginpages.login');
Route::view('merchant', 'merchants.dashboard');
Route::view('admin', 'admin.dashboard');
Route::view('pending', 'admin.dispatcher.pending');
Route::view('approved', 'admin.dispatcher.approved');
Route::view('processing', 'admin.dispatcher.processing');
Route::view('completed', 'admin.dispatcher.completed');
Route::view('cancelled', 'admin.dispatcher.cancelled');
Route::view('approvedmerchant', 'admin.merchant.approvedmerchant');
Route::view('pendingmerchant', 'admin.merchant.pendingmerchant');
Route::view('rejectedmerchant', 'admin.merchant.rejectedmerchant');
Route::view('documentmerchant', 'admin.merchant.documentmerchant');
Route::view('addmerchant', 'admin.merchant.addmerchant');
Route::view('orderdetailsmerchant', 'admin.merchant.orderdetailsmerchant');
Route::view('orderdetails-1merchant', 'admin.merchant.orderdetails-1merchant');
Route::view('shoplicensemerchant', 'admin.merchant.shoplicensemerchant');
Route::view('users', 'admin.user.users');
Route::view('adduser', 'admin.user.adduser');
Route::view('documents', 'admin.documents');
Route::view('promocode', 'admin.promocode');
Route::view('cities', 'admin.cities');
Route::view('reports', 'admin.reports');
Route::view('accounting', 'admin.accounting');
Route::view('notification', 'admin.notification');
Route::view('order', 'merchants.orders.order');
Route::view('orderdetails', 'merchants.orders.orderdetails');
Route::view('product', 'merchants.products.product');
Route::view('addcategory', 'merchants.products.addcategory');
Route::view('editcategory', 'merchants.products.editcategory');
Route::view('addproduct-1', 'merchants.products.addproduct-1');
Route::view('addproduct', 'merchants.products.addproduct');
Route::view('editproduct', 'merchants.products.editproduct');
Route::view('manageoption', 'merchants.products.manageoption');
Route::view('addnewaddons-category', 'merchants.products.addnewaddons-category');
Route::view('addnewaddons', 'merchants.products.addnewaddons');
Route::view('shopdetails', 'merchants.my-profile.shopdetails');
Route::view('rating&reviews', 'merchants.my-profile.rating&reviews');
Route::view('configuration', 'merchants.my-profile.configuration');
