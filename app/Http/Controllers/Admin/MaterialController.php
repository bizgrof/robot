<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Material;

class MaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $materials = Material::all();
        return view('admin.material.index', compact('materials'));
    }

    public function store(Request $request)
    {
        $materials = $request->input('materials');

        foreach($materials as $material){
            Material::updateOrCreate(['id' => $material['id']],$material);
        }

        return Material::all();
    }

    public function destroy($id)
    {
        Material::destroy($id);
    }
}
