<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\OrderObserver;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'user_id',
        'shipping',
        'discount',
        'tax',
        'total',
        'status',
        'payment_status',
        'billing_name',
        'billing_email',
        'billing_phone',
        'billing_address',
        'billing_city',
        'billing_country',
        'shipping_name',
        'shipping_email',
        'shipping_phone',
        'shipping_address',
        'shipping_city',
        'shipping_country',
        'notes',
    ];

    //بستخدم هاي الفنكشن لما اكون بدي اعمل اشي ثابت عند كل عملية انشتاء مثلا
    protected static function booted()
    {
        // بصير على المودل بدل ما اكتب الكود كله هناevent  على أي  listener عشان تعمل observer بستخدم ال 
        static::observe(OrderObserver::class);
    }

    //Model Related Relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
            ->using(OrderItem::class)
            ->as('items')
            ->withPivot(['quantity', 'price']);
    
    }
}    


