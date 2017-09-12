<?php

namespace App\Listeners;

use App\Events\onNewOrder;
use App\Mail\CustomerOrder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class newOrderMailSender
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  onNewOrder  $event
     * @return void
     */
    public function handle(onNewOrder $event)
    {
        Mail::to('zizazh@yandex.ru')->send(new CustomerOrder($event->order));
        Log::info('New order',['asdasdsads']);
    }
}
