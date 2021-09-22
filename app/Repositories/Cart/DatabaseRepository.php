<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class DatabaseRepository implements CartRepository
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected $items;

    public function __construct()
    {
        //collection
        $this->items = collect([]);
    }

    public function all()
    {
        if (!$this->items->count()) {
            //عشان اجيب الكارت لليوزر سواء كان عامل دخول او زائر
            $this->items = Cart::where('cookie_id', $this->getCookieId())
                ->orWhere('user_id', Auth::id())
                ->get();
        }

        return $this->items;
    }

    public function add($item, $qty = 1)
    {
        //updateOrCreate استحدمناها عشان لو البرودكت موجود اصلا بالسلة يعدل تعديل عليه بدل ما يضيقه كمان مرة و يصير تكرار
        
        $cart = Cart::updateOrCreate([
            //هدول العنصريت بتم البحث عنهم بالكارت اذا لاقاهم بعمل ابديت اذا ما لقاهم بنشا لوبجكت جديد
            'cookie_id' => $this->getCookieId(),
            'product_id' => ($item instanceof Product)? $item->id : $item,
        ], [
            'user_id' => Auth::id(),
            //زدنا الكونتتي الجديدة على الموجودة سابقا
            //استخدمنا الرو عشان تتنفذ العملبة الحسابية والا كان راح يخزن العملية كنص في حقل الكونتتي
            'quantity' => DB::raw('quantity + ' . $qty),
        ]);

        $this->items = collect([]);

        return $cart;
    }

    public function clear()
    {
        Cart::where('cookie_id', $this->getCookieId())
            ->orWhere('user_id', Auth::id())
            ->delete();
    }

    
    protected function getCookieId()
    {
        $id = Cookie::get('cart_cookie_id');
        if (!$id) {
            $id = Str::uuid();
            Cookie::queue('cart_cookie_id', $id, 60 * 24 * 30);
        }

        return $id;
    }

    //عشان احسب التوتال لكل الكارت
    public function total()
    {
        $items = $this->all();
        return $items->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
    }

    public function quantity()
    {
        $items = $this->all();
        return $items->sum('quantity');
    }

}