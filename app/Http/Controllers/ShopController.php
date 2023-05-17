<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;
use App\Models\TimeSlot;
use App\Models\Product;

use Image;

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
        // $shop->base_delivery_charges = $request->base_delivery_charges;
        // $shop->delivery_charges_km = $request->delivery_charges_km;
        $shop->min_order_amount = $request->min_order_amount;
        $shop->delivery_radius = $request->delivery_radius;
        if($request->has('image')){
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = "shop/".$fileName;
            $image = Image::make($file->getRealPath());
            $image->save($path);
            $shop->user->image = $path;
            $shop->user->save();
        }
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

        $shop = $request->user()->shop;
        $shop->prepration_time = $request->prepration_time;
        $shop->min_delivery_time = $request->min_delivery_time;
        $shop->max_delivery_time = $request->max_delivery_time;
        $shop->save();
        for ($i=0; $i <= 6; $i++) { 
            TimeSlot::updateOrInsert([
                'user_id' => $request->user()->id,
                'day_num' => $i,
            ], [
                'min_delivery_time' => $request->timefrom[$i],
                'max_delivery_time' => $request->timeto[$i],
            ]);
        }
        return redirect()->back();
    }

    public function index()
    {

    }

    public function shopStatusWise($status)
    {
        $shops =   User::whereHas('shop', function($q) use($status) {
            $q->where('status', $status);
        })->with(['shop'])->get();
        return view('admin.merchant.approvedmerchant', compact('shops', 'status'));
    }

    public function shopProducts($id)
    {
        $products = Product::where('user_id', $id)->paginate();
        return view('admin.merchant.products.index', compact('products'));
    }


    public function update(Request $request, $id)
    {
        $shop = User::findOrFail($id)->shop;
        $shop->status = $request->status;
        $shop->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
