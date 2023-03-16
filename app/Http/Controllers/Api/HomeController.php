<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use MatanYadaev\EloquentSpatial\Objects\Point;
use Illuminate\Http\Request;

use App\Models\Shop;
use App\Models\ProductCategory;
use App\Models\Category;
use App\Models\User;
class HomeController extends Controller
{
    public function shops(Request $request)
    {
        $position = new Point($request->lat, $request->lng);
        $statement = sprintf(
            "ST_Distance_Sphere(location,POINT(%f, %f), %s)",
            $request->lng,
            $request->lat,
            'delivery_radius * 1000'
        );
        // $data =  Shop::query()->whereDistance('location', $position, '<', \DB::raw('delivery_radius * 1000'))->get();
        $ids =  Shop::query()->whereRaw($statement)->withDistance('location', $position)
        ->pluck('user_id');
        $data = User::whereIn('id',$ids)->get();
        return response()->json($data, 200);
    }

}
