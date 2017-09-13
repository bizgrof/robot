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
        $orders = $user->orders()->with(['products'=>function($query){
            $query->with('product');
        }])->get();
        //dd($orders);

        return view('site.user_profile.orders', compact('orders'));
    }

    public function info(){
        $user = Auth::user();
        return view('site.user_profile.user_info', compact('user'));
    }

    public function videos(){
        return redirect()->route('user.orders');
    }

    public function saveInfo(Request $request){
        $inputs = $request->all();
        $user = Auth::user();
        $user->name = $inputs['name'];
        $user->lastname = $inputs['lastname'];
        $user->middlename = $inputs['middlename'];
        $user->phone = $inputs['phone'];
        $user->gender = $inputs['gender'];

        $user->save();

        return redirect()->route('user.info')->withInput();


    }
}
