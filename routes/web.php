<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Shop\ShopOrderController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\OfferController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AddonCategoryController;
use App\Http\Controllers\MailBoxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AddonsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\AppContentController;
use App\Http\Controllers\ShopDocController;
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



Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'doLogin']);
Route::get('shop/reg', [SignupController::class, 'shopStep1']);
Route::post('shop/reg', [SignupController::class, 'doShopStep1']);
Route::get('shop/reg/cat', [SignupController::class, 'shopStep2']);
Route::post('shop/reg/cat', [SignupController::class, 'doShopStep2']);
Route::get('shop/reg/final', [SignupController::class, 'signup']);
Route::post('shop/reg/final', [SignupController::class, 'doSignup']);

Route::group(['middleware' => ['auth', 'setapplang']], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('shopdetails', [ShopController::class, 'profile']);
    Route::post('shopdetails', [ShopController::class, 'doProfile']);
    Route::get('shop-reviews', [ShopController::class, 'reviews']);
    Route::get('shop-configuration', [ShopController::class, 'configuration']);
    Route::post('shop-configuration', [ShopController::class, 'doConfiguration']);

    Route::resource('shop/order', ShopOrderController::class);
    Route::get('shop/{status}/order', [ShopOrderController::class,'status']);
    Route::resource('promos', OfferController::class);
    Route::resource('cities', CityController::class);
    Route::resource('accounting', TransactionController::class);
    Route::resource('addon-cat', AddonCategoryController::class);
    Route::resource('addons', AddonsController::class);
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
    Route::resource('riders', RiderController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('productcategories', ProductCategoryController::class);
    Route::resource('app-content', AppContentController::class);
    Route::resource('shop-docs', ShopDocController::class);
    Route::get('shop-docs-upload/{type}', [ShopDocController::class, 'upload']);
    Route::resource('user-loyalty-card', UserLoyaltyCardController::class);
    Route::get('shops-status/{status}/', [ShopController::class,'shopStatusWise']);
    Route::get('shop-products/{id}/', [ShopController::class,'shopProducts']);
    Route::get('product-addons/{id}', [ProductController::class, 'addon']);
    Route::post('product-addons', [ProductController::class, 'doAddon']);

    Route::get('merchant', [HomeController::class, 'merchant']);
    Route::get('admin', [HomeController::class, 'admin']);
    Route::get('documents/{role}/{user}', [DocumentController::class,'getdocs']);
    Route::get('documents/{role}/{user}/{type}', [DocumentController::class,'viewStatus']);
    // Route::get('documents/{id}', [DocumentController::class,'show']);
    Route::resource('documents', DocumentController::class);
    Route::resource('mailboxes', MailBoxController::class);

    
    Route::get('notification', [HomeController::class, 'notification']);
    Route::post('notification', [HomeController::class, 'doNotification']);

    // App settings
    Route::get('app-setting', [HomeController::class, 'appSetting']);
    Route::post('app-setting', [HomeController::class, 'doAppSetting']);

    // Loyalty Cards Discounts
    Route::get('loyalty-card-discount', [HomeController::class, 'shopLoyalDiscount']);
    Route::post('loyalty-card-discount', [HomeController::class, 'doShopLoyalDiscount']);

    // Route::view('approvedmerchant', 'admin.merchant.approvedmerchant');
    // Route::view('pendingmerchant', 'admin.merchant.pendingmerchant');
    // Route::view('rejectedmerchant', 'admin.merchant.rejectedmerchant');
    // Route::view('documentmerchant', 'admin.merchant.documentmerchant');
    // Route::view('addmerchant', 'admin.merchant.addmerchant');
    // Route::view('orderdetailsmerchant', 'admin.merchant.orderdetailsmerchant');
    // Route::view('orderdetails-1merchant', 'admin.merchant.orderdetails-1merchant');
    // Route::view('shoplicensemerchant', 'admin.merchant.shoplicensemerchant');
    // Route::view('documents', 'admin.documents');
    // Route::view('reports', 'admin.reports');
    // Route::view('addcategory', 'merchants.products.addcategory');
    // Route::view('editcategory', 'merchants.products.editcategory');
    // Route::view('addproduct-1', 'merchants.products.addproduct-1');
    // Route::view('addproduct', 'merchants.products.addproduct');
    // Route::view('editproduct', 'merchants.products.editproduct');
    // Route::view('manageoption', 'merchants.products.manageoption');
    // Route::view('addnewaddons', 'merchants.products.addnewaddons');
    Route::get('lang', [HomeController::class,'lang_change'])->name('lang_change');
});

