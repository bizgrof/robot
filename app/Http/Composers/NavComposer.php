<?php
/**
 * Created by PhpStorm.
 * User: Maga
 * Date: 30.08.2017
 * Time: 16:38
 */

namespace App\Http\Composers;
use App\Cart;


use Illuminate\Contracts\View\View;

class NavComposer
{
    public function compose(View $view)
    {
        $cart = Cart::getCart();
        $view->with(compact('cart'));
    }
}