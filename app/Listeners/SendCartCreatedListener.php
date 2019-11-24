<?php

namespace App\Listeners;

use App\Notifications\OrderCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\OrderCreated;
use App\Mail\OrderCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendCartCreatedListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        Mail::to($event->cart->email)->send(new OrderCreatedMail($event->cart));
    }
}
