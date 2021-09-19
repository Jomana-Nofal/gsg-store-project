<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return view('user.products',compact('products'));
    }
}
