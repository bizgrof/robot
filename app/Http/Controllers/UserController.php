<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function orders(){
        return view('site.user_profile.orders');
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
