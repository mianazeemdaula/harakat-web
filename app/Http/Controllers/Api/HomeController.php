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
    public function index()
    {
        $position = new Point(30.672956, 73.655428);
        $statement = sprintf(
            "ST_Distance_Sphere(location,POINT(%f, %f), %s)",
            73.655428,
            30.672956,
            'delivery_radius * 1000'
        );
        // $data =  Shop::query()->whereDistance('location', $position, '<', \DB::raw('delivery_radius * 1000'))->get();
        $ids =  Shop::query()->whereRaw($statement)->withDistance('location', $position)
        ->pluck('user_id');
        $data = User::whereIn('id',$ids)->get();
        return response()->json($data, 200);
    }

}
