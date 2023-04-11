<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
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
        $menus = Category::query()->active()->get();
        return response()->json($menus, 200);
    }

    public function menuShops(Request $request)
    {
        $ids =  Shop::query()->nearBy($request->lat, $request->lng)->where('category_id', $request->category)
        ->pluck('user_id');
        $data = User::whereIn('id',$ids)->paginate();
        return response()->json($data, 200);
    }

    public function shopProducts(Request $request)
    {
        $products = Product::with(['category','shop','addons'])
        ->where('user_id', $request->shop)->paginate();
        return response()->json($products, 200);
    }


    public function popularProducts(Request $request)
    {
        $products = Product::with(['category','shop','addons'])->get();
        return response()->json($products, 200);
    }
}
