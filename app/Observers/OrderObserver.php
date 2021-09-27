<?php

namespace App\Observers;
use Carbon\Carbon;
use App\Models\Order;

class OrderObserver
{
    // معين event ل   listener كل فنكشن هما بتمثل 

    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        //
    }


    /**
     * Handle the Order "creating" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function creating(Order $order)
    {
     
        
        //عشان اعمل انشاء لرقم الاوردر 20200001
        $now = Carbon::now();
        $number = Order::whereYear('created_at', '=', $now->year)->max('order_number');
        $order->order_number = $number? intval($number) + 1 : $now->year . '0001';

        //عشان احط بيانات الشيبينق لو ما كان اليوزر مدخلها هحطها نفس بيانات البيلينق
        if (!$order->shipping_name) {
            $order->shipping_name = $order->billing_name;
        }
        if (!$order->shipping_email) {
            $order->shipping_email = $order->billing_email;
        }
        if (!$order->shipping_phone) {
            $order->shipping_phone = $order->billing_phone;
        }
        if (!$order->shipping_address) {
            $order->shipping_address = $order->billing_address;
        }
        if (!$order->shipping_city) {
            $order->shipping_city = $order->billing_city;
        }
        if (!$order->shipping_country) {
            $order->shipping_country = $order->billing_country;
        }
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
