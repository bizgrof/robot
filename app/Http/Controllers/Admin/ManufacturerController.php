<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manufacturer;

class ManufacturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $manufacturers = Manufacturer::all();
        return view('admin.manufacturer.index', compact('manufacturers'));
    }

    public function store(Request $request){
        $manufacturers = $request->input('manufacturers');

        foreach($manufacturers as $manufacturer){
            Manufacturer::updateOrCreate(['id' => $manufacturer['id']],$manufacturer);
        }

        return Manufacturer::all();
    }

    public function destroy($id){
        Manufacturer::destroy($id);
    }

    public function create(){}
    public function show($id){}
    public function edit($id){}
    public function update(Request $request, $id){}
}
