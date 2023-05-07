<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class ShopOrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        // $orders =  Order::where('shop_id',$user->id)->where('status', 'pending')->get();
        $orders =  Order::all();
        return view('merchants.orders.order', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        return $request->all();
    }
}
