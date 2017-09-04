<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::getCart();
        $product_ids = Cart::getProductIds();
        $products = Product::findMany($product_ids);

        $user = Auth::user();
        return view('site.cart', compact('products','cart','user'));
    }

    public function add(Request $request){
        $product_id = (integer) $request->input('product_id');
        $qty = (integer) $request->input('qty');

        return Cart::add($product_id, $qty);
    }

    public function clear(){
        Cart::clear();
    }

    public function updateProductQty(Request $request){
        $product_id = (integer) $request->input('product_id');
        $qty = (integer) $request->input('qty');

        return Cart::updateProductQty($product_id, $qty);
    }

    public function getCart(){
        return Cart::getCart();
    }
}