<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
           if(auth()->user()->hasRole('admin')){
            return redirect('admin');
           }else{
            return  redirect('merchant');
           }
        }
        return view('loginpages.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(auth()->user()->hasRole('admin')){
                return redirect()->intended('admin');
            }else{
                return redirect()->intended('merchant');
            }
        }else{
            return redirect()->back()->withErrors(['error' => 'Credentials not matched.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
