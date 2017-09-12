<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function orders(){
        $user = Auth::user();
        //$orders = $user->orders()->with('');
        return view('site.user_profile.orders', compact('orders'));
    }

    public function info(){
        return view('site.user_profile.user_info');
    }

    public function videos(){
        return view('site.user_profile.orders');
    }

    public function saveInfo(Request $request){

    }
}
