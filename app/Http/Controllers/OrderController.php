<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Symfony\Component\Intl\Countries;
use App\Events\OrderCreated;
use App\Notifications\sendInvoiceNotification;
use Illuminate\Support\Facades\Notification;



class OrderController extends Controller
{
    // checkout عشان أوصل لمحتوى السلة لليوزر الي بده يعمل 
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

     public function create()
    {
        return view('user.checkout',[
            'cart' => $this->cart,
            'user' => Auth::user(),
            'countries' => Countries::getNames('en'),
        ]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'billing_name' => ['required', 'string'],
            'billing_phone' => 'required',
            'billing_email' => 'required|email',
            'billing_address' => 'required',
            'billing_city' => 'required',
            'billing_country' => 'required',
        ]);
        

        //عشان أتفادى حصول مشكلة في الداتا بيز لامع عندي اكتر من عملية
        DB::beginTransaction();
        try {
            //بستخدم الميرج عشان اضيف حقل ما راح يتم ارسال قيمته بالريكوست فبعمل دمج اله مع الريكوست عشان يصير جزء منه
            $request->merge([
                'total' => $this->cart->total(),
            ]);
            $order = Order::create($request->all());
            
           
            foreach ($this->cart->all() as $item) {
                //بعمل اضافة على جدول الاوردر ايتم من خلال الريلشن وممكن ننفذها بالطريقة التفليدية
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                
            }

            DB::commit();
            //ممكن اعمل كلاس خاص لهاي الايفنت  او ممكن زي ما احنا عاملين بتعامل مع الايفنت مباشرة لكن الليسينر لازم اله كلاس
            event(new OrderCreated($order));
            event('sendInvoice',$order);
            // Notification::send( new sendInvoiceNotification($order));
            return redirect()->back()->with('status', __('Order created Sucessfuly .'));
            
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
