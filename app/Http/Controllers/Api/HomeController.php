<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use MatanYadaev\EloquentSpatial\Objects\Point;
use Illuminate\Http\Request;

use App\Models\Shop;
use App\Models\ProductCategory;
use App\Models\Category;
use App\Models\User;
use App\Models\Offer;
class HomeController extends Controller
{
    public function shops(Request $request)
    {
        // $position = new Point($request->lat, $request->lng);
        // $statement = sprintf(
        //     "ST_Distance_Sphere(location,POINT(%f, %f), %s)",
        //     $request->lng,
        //     $request->lat,
        //     'delivery_radius * 1000'
        // );
        // $ids =  Shop::query()->whereRaw($statement)->withDistance('location', $position)
        // ->pluck('user_id');
        $ids = Shop::nearByIds($request->lat, $request->lng);
        $data = User::whereIn('id',$ids)->get();
        return response()->json($data, 200);
    }

    public function offers(Request $request)
    {
        $ids = Shop::nearByIds($request->lat, $request->lng);
        $data = Offer::whereIn('shop_id',$ids)->get();
        return response()->json($data, 200);
    }

    

}
