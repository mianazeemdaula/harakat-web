<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Address;
use App\Models\SocialAccount;
use \Hash;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;


use MatanYadaev\EloquentSpatial\Objects\Point;

class AuthCustomerController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['email' => 'The provided credentials are incorrect.'], 204); 
        }
        if($request->has('fcm_token')){
            $user->fcm_token = $request->fcm_token;
            $user->save();
        }
        $token = $user->createToken('login')->plainTextToken;
        $data['token'] = $token;
        $data['user'] = $user;
        // $data['addresses'] = $user->addresses;
        return response()->json($data, 200);
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'sometimes|unique:users|email',
            'mobile' => 'required|unique:users',
            'dob' => 'required',
            'gender' => 'required',
            'city_id' => 'required'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->image = "https://ui-avatars.com/api/?name=".str_replace(' ', '+', $request->name);
        $user->save();
        $customer = new Customer;
        $customer->city_id = $request->city_id;
        $customer->gender = $request->gender;
        $customer->dob = $request->dob;
        $customer->user_id = $user->id;
        $customer->save();
        $user->customer;
        $token = $user->createToken('login')->plainTextToken;
        $data['token'] = $token;
        $data['user'] = $user;
        // $data['addresses'] = $user->addresses;
        return response()->json($data, 200);
    }

    public function social(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'provider' => 'required',
        ]);
        $provider = $request->provider;
        $token = $request->token;
        $socialUser = Socialite::driver($provider)->userFromToken($token);
        $social = SocialAccount::updateOrCreate([
            'provider' => $provider,
            'uid' => $socialUser->getId(),
        ]);
        if(!$social->user){
            $user= User::where('email', $socialUser->getEmail())->first();
            if(!$user){
                $user = new User();
                $user->name = $socialUser->name;
                $user->email = $socialUser->getEmail();
                $user->image = $socialUser->getAvatar();
                $user->email_verified_at = Carbon::now();
                $user->save();
            }
        }else{
            $user = $social->user;
        }
        $social->user_id = $user->id;
        $social->save();
        $data['token'] = $user->createToken('login')->plainTextToken;
        $data['user'] = $user;
        return response()->json($data, 200);
    }

    public function completeProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            // 'mobile' => 'required|unique:users',
            'dob' => 'required',
            'gender' => 'required',
            'city_id' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if($user){
            $customer = new Customer;
            $customer->city_id = $request->city_id;
            $customer->gender = $request->gender;
            $customer->dob = $request->dob;
            $customer->user_id = $user->id;
            $customer->save();
            $user->customer;
            $token = $user->createToken('login')->plainTextToken;
            $data['token'] = $token;
            $data['user'] = $user;
            return response()->json($data, 200);
        }else{
            return response()->json(['email' => 'The provided credentials are incorrect.'], 204); 
        }
    }


    public function mobileRegister(Request $request)
    {
        $user = User::where('mobile', $request->mobile)->first();
        if($user){
            return response()->json(['register'=> true], 200);
        }
        return response()->json(['register'=> false], 200);
    }

    public function socialcallback(Request $request)
    {
        return $request->all();
    }
}
