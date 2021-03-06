<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Cart\CartRepository;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $cart = $this->cart->all();
      
        return view('user.cart',['cart'=>$cart,'total'=>$this->cart->total(),]);
     
    }

    public function store(Request $request)
    {
    
        //الكوكي اي دي بتم اضافته في الداتابيز ريبوزيتوري 
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['int', 'min:1', function($attr, $value, $fail) {
                $id = request()->input('product_id');
                $product = Product::find($id);
                //عشان نشوف اذا الكونتتي الي طلبها اليوزر اكبر من الموجودة فعليا عنا ولا لا 
                if ($value > $product->quantity) {
                    // $fail(__('Quantity greater than quantity in our stock.'));
                     return redirect()->back()->with('status', __('Item added to cart!'));
                }
            }],
        ]);

        $carts = $this->cart->add($request->post('product_id'), $request->post('quantity', 1));
        return redirect()->back()->with('status', __('Item added to cart!'));
    }

    public function destroy($id)

    {
        $item = Cart::where('product_id','=',$id)->delete();
        return redirect()->route('cart.index')->with('status', __('Item deleted from the cart!'));
    }

   function update(Request $request ,$id)

    {
       $cart = Cart::findOrFail($id);
       $quantity = $cart->product->quantity;
       if($request->quantity >$quantity){
            return redirect()->route('cart.index')->with('status-_danger', __('Warninng !!!product quantity greater than quantity on stock!'));
       }else{
            $cart->update($request->all()); 
            return redirect()->route('cart.index')->with('status', __('product quantity  updated sucsesfuly!'));
       }
       
    }
}
