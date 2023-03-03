<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use MatanYadaev\EloquentSpatial\Objects\Point;
use Illuminate\Http\Request;

use App\Models\Merchant;

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
        // $data =  Merchant::query()->whereDistance('location', $position, '<', \DB::raw('delivery_radius * 1000'))->get();
        $data =  Merchant::query()->whereRaw($statement)->withDistance('location', $position)->get();
        return response()->json($data, 200);
    }
}
