<?php

namespace App\Http\Controllers;

use App\Events\onNewOrder;
use App\Order;
use App\OrderProduct;
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

    public function remove(Request $request){
        return Cart::remove($request->input('product_id'));
    }

    public function checkout(Request $request){
        $inputs = $request->only(['firstname', 'lastname', 'phone', 'email', 'address', 'comment','gift_wrap','pay_type']);
        $inputs['total_qty'] = Cart::getTotal()['total_qty'];
        $inputs['total_cost'] = Cart::getTotal()['total_cost'];
        $inputs['order_status_id'] = 1;


        $order = new Order();
        $order->fill($inputs);

        if(Auth::check()){
            $user = Auth::user();
            $user->orders()->save($order);
        }else{
            $order->save();
        }

        $cart_products = Cart::getProduct();

        foreach($cart_products as $cart_product){
            $product = Product::find($cart_product['product_id']);

            $order_product = new OrderProduct();
            $order_product->name = $product->name;
            $order_product->price = $product->price;
            $order_product->product_id = $product->id;
            $order_product->qty = $cart_product['qty'];
            $order_product->cost = $cart_product['cost'];
            $order->products()->save($order_product);
        }
        Cart::clear();
        event(new onNewOrder($order));

        if($inputs['pay_type'] == 'receipt_pay'){
            return ['redirect' => route('cart.success')];
        }

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

    public function success(){
        return view('site.success');
    }
}