<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function show($category, $brand, $alias){
        $product = Product::where('alias',$alias)->with(['material','country','manufacturer','images','category'])->first();
        return view('site.product', compact('product'));
    }
}
