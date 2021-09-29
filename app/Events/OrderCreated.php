<?php

namespace App\Events;
use App\Models\Order;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //هادي الشانيل راح يتم تعريفها داخل ملف الشانيل الموجود في مجلد الراوت
        return new PrivateChannel('orders');
    }


    // هاي الفنكشن عشان احدد بالزبط شو راح يام ارساله لو ما حددت راح يرسل كل الببليك الي انا معرفاهم
    public function broadcastWith()
    {
        return [
            'order' => [
                'id' => $this->order->id,
                'number' => $this->order->order_number,
                'order_status'=>$this->order->order_status,
                'total_price'=>$this->order->total,
            ],
        ];
    }

    //عشان احدد شو يكون مكتوب اسم الايفنت لما يتم ارساله
    public function broadcastAs()
    {
        return 'order.created';
    }
}
