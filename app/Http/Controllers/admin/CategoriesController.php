<?php

namespace App\Http\Controllers\admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('adminCategories.index', compact('categories'));
    }

    public function create()
    {
        return view('adminCategories.create');
    }

    public function store(Request $request)
    {
       
        $category = new Category([
            'name' => $request['name'],
            'discription' => $request['discription'],
            'slug' => Str::slug($request['name']),
            'status' => 'active',
        ]);

        $category->save();
        return redirect()->back(); 
       }
    
}
