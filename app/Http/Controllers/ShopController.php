<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;

class ShopController extends Controller
{
    public function profile(){
        $shop = auth()->user();
        return view('merchants.my-profile.shopdetails', compact('shop'));
    }

    public function doProfile(Request $request){
        $shop = $request->user()->shop;
        $shop->shop_name = $request->name;
        $shop->phone = $request->phone;
        $shop->base_delivery_charges = $request->base_delivery_charges;
        $shop->delivery_charges_km = $request->delivery_charges_km;
        $shop->min_order_amount = $request->min_order_amount;
        $shop->delivery_radius = $request->delivery_radius;
        $shop->save();
        return redirect()->back();
    }

    public function reviews(){
        $reviews = auth()->user()->reviews;
        return view('merchants.my-profile.rating&reviews', compact('reviews'));
    }

    public function configuration(){
        $shop = auth()->user();
        return view('merchants.my-profile.configuration', compact('shop'));
    }

    public function doConfiguration(Request $request){
        return $request->all();
    }


    public function update(Request $request, $id)
    {

    }
}
