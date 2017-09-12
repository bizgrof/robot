<?php

namespace App\Http\Controllers\Admin;

use App\Events\onNewOrder;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        $order = Order::find(42);

        //event(new onNewOrder($order));

        return view('admin.order.index',compact('orders'));
    }

    public function show($order_id){
        $order = Order::where('id', $order_id)->with(['products'])->first();
        return view('admin.order.show', compact('order'));
    }
}
