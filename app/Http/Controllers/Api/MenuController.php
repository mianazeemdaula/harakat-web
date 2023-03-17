<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;

class MenuController extends Controller
{
    public function menus()
    {
        $menus = ProductCategory::query()->active()->get();
        return response()->json($menus, 200);
    }
    
    public function categories()
    {
        $menus = ProductCategory::query()->active()->get();
        return response()->json($menus, 200);
    }

    public function menuShops(Request $request)
    {
        $statement = sprintf(
            "ST_Distance_Sphere(location,POINT(%f, %f), %s)",
            $request->lng,
            $request->lat,
            'delivery_radius * 1000'
        );
        $ids =  Shop::query()->whereRaw($statement)->withDistance('location', $position)
        ->where('category_id', $request->category)
        ->pluck('user_id');
        $data = User::whereIn('id',$ids)->get();
        return response()->json($products, 200);
    }

    public function shopProducts(Request $request)
    {
        $data = User::with(['products'])->find($request->id);
        return response()->json($data, 200);
    }

    public function menuProduct(Request $request)
    {
        $products = Product::with(['category','shop'])->get();
        return response()->json($products, 200);
    }

    public function popularProducts(Request $request)
    {
        $products = Product::with(['category','shop'])->get();
        return response()->json($products, 200);
    }
}
