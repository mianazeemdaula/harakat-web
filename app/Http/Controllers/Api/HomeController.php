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
