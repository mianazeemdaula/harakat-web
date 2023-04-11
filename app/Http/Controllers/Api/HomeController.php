<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use MatanYadaev\EloquentSpatial\Objects\Point;
use Illuminate\Http\Request;

use App\Models\Shop;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductCategory;
use App\Models\Category;
use App\Models\User;
use App\Models\Offer;
class HomeController extends Controller
{

    public function home(Request $request)
    {
        $user = $request->user();
        $ids = Shop::nearBy($request->lat, $request->lng)->pluck('user_id');
        $data['shops'] = User::whereIn('id',$ids)->take(5)->get();
        $data['products'] = Product::whereIn('id',$ids)->take(5)->get();
        $data['popular'] = Product::whereIn('id',$ids)->take(5)->get();
        if($user){
            $orderIds = Order::where('user_id', $user->id)->latest()->take(10)->pluck('id');
            $productIds = OrderDetail::whereIn('order_id', $orderIds)->pluck('product_id');
            $data['recent_products'] = Product::whereIn('id',$productIds)
            ->with(['category','shop','addons'])->take(10)->get();
        }else{
            $data['recent_products'] = [];
        }
        return response()->json($data, 200);
    }
    public function shops(Request $request)
    {
        $ids = Shop::nearBy($request->lat, $request->lng)->pluck('user_id');
        $data = User::whereIn('id',$ids)->get();
        return response()->json($data, 200);
    }

    public function offers(Request $request)
    {
        $ids = Shop::nearBy($request->lat, $request->lng)->pluck('user_id');
        $data = Offer::with(['shop'])->whereIn('user_id',$ids)->get();
        return response()->json($data, 200);
    }

    

}
