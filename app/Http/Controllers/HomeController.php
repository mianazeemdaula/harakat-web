<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use DB;

class HomeController extends Controller
{
     public function merchant()
     {
        $orders_count =  DB::table('orders')->select(DB::raw('DATE(created_at) AS date'), DB::raw('COUNT(*) AS count'))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->whereDate('created_at', '>=' ,now()->subDays(5))->get();

        $revenue =  Transaction::select(DB::raw('DATE(created_at) AS date'), DB::raw('COUNT(*) AS count'))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->whereDate('created_at', '>=' ,now()->subDays(5))->get();
        return view('merchants.dashboard', compact('orders_count', 'revenue'));
     }
}
