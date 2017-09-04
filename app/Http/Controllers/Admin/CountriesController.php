<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;

class CountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $countries = Country::all()->toJson();
        return view('admin.country.index', compact('countries'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $countries = $request->input('countries');

        foreach($countries as $country){
            Country::updateOrCreate(['id' => $country['id']],$country);
        }

        return Country::all();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Country::destroy($id);
    }
}
