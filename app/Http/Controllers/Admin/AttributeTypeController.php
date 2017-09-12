<?php

namespace App\Http\Controllers\Admin;

use App\AttributeType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $attribute_types = AttributeType::all()->toJson();
        return view('admin.attribute_type.index', compact('attribute_types'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $attribute_types = $request->input('attribute_types');

        foreach($attribute_types as $attribute_type){
            AttributeType::updateOrCreate(['id' => $attribute_type['id']],$attribute_type);
        }

        return AttributeType::all();
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
        AttributeType::destroy($id);
    }
}
