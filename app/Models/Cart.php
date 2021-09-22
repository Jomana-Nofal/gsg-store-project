<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id', 'cookie_id', 'product_id', 'user_id', 'quantity',
    ];

    protected $with = [
        'product',
    ];

    //استحدمنا هادي الفنكشن عشان في شغلة بدي اعملها كل ما اعمل كريت لاوبجكت من الكارت 
    protected static function booted()
    {
        //عملنا الاي دي  هنا عشان ما يتم التعديل عليه لما اعدل على عنصر بالكارت
        static::creating(function (Cart $cart) {
            $cart->id = Str::uuid();
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
