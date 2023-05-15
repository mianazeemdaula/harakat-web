<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Transaction;
use DB;

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
}
