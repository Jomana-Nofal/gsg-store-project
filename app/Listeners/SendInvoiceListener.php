<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoice;
class SendInvoiceListener
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
        //بدي أرسل ايميل لصاحب الاوردر بالفاتورة
        //  فلازم أنشأه بالارتيزن maillable class بتحتاج  send() ال 
        // Mail::to($order->billing_email)->send(new OrderInvoice($order));
        dd($order);
    }
}
