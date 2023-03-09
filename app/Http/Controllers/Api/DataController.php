<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\City;

class DataController extends Controller
{
    public function cities()
    {
        $data = City::all();
        return response()->json($data, 200);
    }
}
