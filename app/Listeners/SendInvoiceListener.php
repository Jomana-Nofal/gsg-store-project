<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
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
    public function handle(OrderCreated $event)
    {
        //بدي أرسل ايميل لصاحب الاوردر بالفاتورة
        //  فلازم أنشأه بالارتيزن maillable class بتحتاج  send() ال 
        
        
    }
}
