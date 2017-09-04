<?php
/**
 * Created by PhpStorm.
 * User: Maga
 * Date: 29.08.2017
 * Time: 16:30
 */

namespace App;

use Illuminate\Support\Facades\Session;
use App\Product;

class Cart
{
    static public function add($product_id, $qty){
        Session::increment("cart.products.$product_id.qty", $qty);
        Session::put("cart.products.$product_id.product_id", $product_id);
        return self::update();
    }

    static public function updateProductQty($product_id, $qty){
        Session::put("cart.products.$product_id.qty", $qty);
        return self::update();
    }

    static public function getCart(){
        $cart = Session::get('cart');
        if($cart){
            $cart['total_cost'] = price($cart['total_cost']);
            foreach($cart['products'] as $key => $product){
                $cart['products'][$key]['cost'] = price( $cart['products'][$key]['cost'] );
            }
        }

        return $cart;
    }

    static public function clear(){
        Session::forget('cart');
        return self::update();
    }

    static public function update(){
        $total_qty = 0;
        $total_cost = 0;
        $cart_products = Session::get('cart.products');
        foreach($cart_products as $cart_product){
            $product = Product::find($cart_product['product_id']);
            Session::put("cart.products.".$cart_product['product_id'].".cost", $product->price * $cart_product['qty']);
            $total_qty += $cart_product['qty'];
            $total_cost += $product->price * $cart_product['qty'];
        }
        $total_cost = $total_cost;
        Session::put('cart.total_qty',$total_qty);
        Session::put('cart.total_cost',$total_cost);

        return self::getCart();
    }

    static public function getProductIds(){
        if(self::getCart()){
            return array_pluck(Session::get('cart.products'),'product_id');
        }
        return false;
    }

    static public function getProductCost($id){
        $cost = Session::get("cart.products.$id.cost");
        return number_format($cost,0,'',' ');
    }
}