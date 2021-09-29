<?php

namespace App\Listeners;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class InvoiceListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($order)
    {
        // dd($order);
        Mail::to($order->billing_email)->send(new OrderInvoice($order));
    }
}
