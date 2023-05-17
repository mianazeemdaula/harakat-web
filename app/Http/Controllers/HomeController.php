<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Setting;
use App\Models\LoyaltyCard;
use App\Models\ShopLoyaltyCardDiscount;
use \App\Helper\FCM;
use DB;
use App;


class HomeController extends Controller
{
     public function merchant()
     {
         $user = auth()->user();
        $orders_count =  DB::table('orders')->select(DB::raw('DATE(created_at) AS date'), DB::raw('COUNT(*) AS count'))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->whereDate('created_at', '>=' ,now()->subDays(5))->get();

        $revenue =  Transaction::select(DB::raw('DATE(created_at) AS date'), DB::raw('COUNT(*) AS count'))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->whereDate('created_at', '>=' ,now()->subDays(5))->get();
        $pendingCount = Order::where('user_id',$user->id)->whereStatus('pending')->count();
        $activeCount = Order::where('user_id',$user->id)->whereStatus('active')->count();
        $cancelCount = Order::where('user_id',$user->id)->whereStatus('canceled')->count();
        return view('merchants.dashboard', compact('orders_count', 'revenue'));
     }

     public function admin()
     {
          $totalRider = User::whereHas('rider')->count();
          $totalShop = User::whereHas('shop')->count();
          $totalUser = User::whereHas('customer')->count();
          $todayUser = User::whereDate('created_at', now())->count();
          return view('admin.dashboard', compact('totalRider', 'totalShop','todayUser','totalUser'));
     }

     public function lang_change()
     {
          $locale = App::currentLocale();
          if($locale == 'en'){
               session()->put('locale', 'ar');  
          }else{
               session()->put('locale','en');  
          }
          return redirect()->back();
    }

    public function notification()
    {
     $users = User::whereHas('shop')->orWhereHas('customer')->get();
     return view('admin.notification', compact('users'));
    }

    public function doNotification(Request $request)
    {
          $riders =  $request->has('riders');
          $shops =  $request->has('shops');
          $users =  $request->has('users');
          if($riders){
               $tokens = User::whereHas('rider')->whereNotNull('fcm_token')->pluck('fcm_token');
               $data = array();
               foreach ($tokens->chunk(1000) as $value) {
                    $keys = $value->toArray();
                    $data[] = FCM::send($keys, $request->title, $request->body,[]);
               }
          }
          if($shops){
               $tokens = User::whereHas('shop')->whereNotNull('fcm_token')->pluck('fcm_token');
               $data = array();
               foreach ($tokens->chunk(1000) as $value) {
                    $keys = $value->toArray();
                    $data[] = FCM::send($keys, $request->title, $request->body,[]);
               }
          }
          if($users){
               $tokens = User::whereHas('customer')->whereNotNull('fcm_token')->pluck('fcm_token');
               $data = array();
               foreach ($tokens->chunk(1000) as $value) {
                    $keys = $value->toArray();
                    $data[] = FCM::send($keys, $request->title, $request->body,[]);
               }
          }
          if($request->individual){
               $tokens = User::whereIn('id',$request->individual)->whereNotNull('fcm_token')->pluck('fcm_token');
               $data = array();
               foreach ($tokens->chunk(1000) as $value) {
                    $keys = $value->toArray();
                    $data[] = FCM::send($keys, $request->title, $request->body,[]);
               }
          }
          return redirect()->back();
    }

    public function appSetting()
    {
     $settings = Setting::whereCategory('app')->get();
     return view('admin.app_settings', compact('settings'));
    }

    public function doAppSetting(Request $request)
    {
          foreach ($request->all() as $key => $value) {
               Setting::whereCategory('app')->wherekey($key)->update([
                    'value' => $value
               ]);
          }
          return redirect()->back();
    }

    public function shopLoyalDiscount()
    {
     $cards = LoyaltyCard::whereActive(true)->get();
     return view('merchants.offers.loyality_card_discounts', compact('cards'));
    }

    public function doShopLoyalDiscount(Request $request)
    {
         foreach ($request->all() as $key => $value) {
          if(str_contains($key, 'key-')){
               ShopLoyaltyCardDiscount::updateOrCreate([
                    'loyalty_card_id' => explode('-', $key)[1],
                    'user_id' => auth()->id(),
          ],['discount_percent' => $value, 'status' => 'active']);
          }
               
          }
          return redirect()->back();
    }
}
