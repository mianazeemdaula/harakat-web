<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\City;
use App\Models\User;
use App\Models\Shop;
use App\Models\ShopDocument;
use App\Models\TimeSlot;

use MatanYadaev\EloquentSpatial\Objects\Point;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class SignupController extends Controller
{

    public function shopStep1(Request $request)
    {
        return view('loginpages.step1');
    }

    public function doShopStep1(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        session(['name' =>$request->name]);
        return redirect('shop/reg/cat');
    }

    public function shopStep2()
    {
        $categories = Category::all();
        return view('loginpages.step2', compact('categories'));
    }

    public function doShopStep2(Request $request)
    {
        $request->validate([
            'category' => 'required',
        ]);
        session(['category' =>$request->category]);
        return redirect('shop/reg/final');
    }

    public function signup(Request $request)
    {
        $cities = City::all();
        return view('loginpages.step3', compact('cities'));
    }

    public function doSignup(Request $request)
    {
        $request->validate([
            'lat' => 'required',
            'lng' => 'required',
            'shop_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'other_license' => 'required',
            'awards' => 'required',
            'phone' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $name =  session('name');
            $category =  session('category');
            $address =  \App\Helper\Helper::getAddress($request->lat, $request->lng);
            $user = new User;
            $user->name = $name;
            $user->email = $request->email;
            $user->mobile = $request->phone;
            $user->password = bcrypt( $request->password);
            $user->save();
            $shop  = new Shop;
            $shop->user_id = $user->id;
            $shop->category_id = $category;
            $shop->city_id = $request->city;
            $shop->shop_name = $request->shop_name;
            $shop->phone = $request->phone;
            $shop->address = $address;
            $shop->location = new Point($request->lat, $request->lng);
            $shop->save();
            $licenses =  explode(",",$request->other_license);
            foreach ($licenses as $licens) {
                $doc = new ShopDocument;
                $doc->shop_id = $user->id;
                $doc->doc = $licens;
                $doc->title = $licens;
                $doc->type = 'licence';
                $doc->save();
            }

            $awards =  explode(",",$request->awards);
            foreach ($awards as $award) {
                $doc = new ShopDocument;
                $doc->shop_id = $user->id;
                $doc->doc = $award;
                $doc->title = $award;
                $doc->type = 'award';
                $doc->save();
            }
            for ($i=0; $i <= 6; $i++) { 
                $timeslot = new TimeSlot();
                $timeslot->min_delivery_time = '10:00:00';
                $timeslot->max_delivery_time = '20:00:00';
                $timeslot->day_num = $i;
                $timeslot->user_id = $user->id;
                $timeslot->save();
            }
            $user->assignRole('shop');
            DB::commit();
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->intended('shop');
            }
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
