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
use App\Models\Setting;
class HomeController extends Controller
{

    public function home(Request $request)
    {
        $user = $request->user();
        $ids = Shop::nearBy($request->lat, $request->lng)
        ->where('category_id', $request->cat_id)
        ->where('status', 'approved')->pluck('user_id');
        $data['shops'] = User::whereIn('id',$ids)->take(5)->get();
        $data['products'] = Product::with(['category','shop','addons'])->whereIn('id',$ids)->take(5)->get();
        $data['popular'] = Product::with(['category','shop','addons'])->whereIn('id',$ids)->take(5)->get();
        
        return response()->json($data, 200);
    }

    public function recentProducts(Request $request)
    {
        $user = $request->user();
        if($user){
            $orderIds = Order::where('user_id', $user->id)->latest()->take(10)->pluck('id');
            $productIds = OrderDetail::whereIn('order_id', $orderIds)->pluck('product_id');
            $data = Product::whereIn('id',$productIds)
            ->with(['category','shop','addons'])->take(10)->get();
        }else{
            $data = [];
        }
        return response()->json($data, 200);
    }
    public function shops(Request $request)
    {
        $ids = Shop::nearBy($request->lat, $request->lng)
        ->where('status', 'approved')->pluck('user_id');
        $data = User::whereIn('id',$ids)->get();
        return response()->json($data, 200);
    }

    public function offers(Request $request)
    {
        $ids = Shop::nearBy($request->lat, $request->lng)
        ->where('status', 'approved')->pluck('user_id');
        $data = Offer::with(['shop'])->whereIn('user_id',$ids)->get();
        return response()->json($data, 200);
    }

    public function settings()
    {
        $url = url()->current();
        $data = null;
        if (str_contains($url, 'customer')) {
            $data = Setting::where('category','app')->get();
        }else{
            $data = Setting::where('category','rider')->get();
        }
        return response()->json($data, 200);
    }

}
