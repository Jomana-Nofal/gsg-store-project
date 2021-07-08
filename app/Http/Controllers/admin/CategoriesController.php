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
            'status' => $request['status'],

        ]);

        $category->save();
        return redirect()->back()->with('status', ' Category Was Saved!');
       }


       public function edit($id)
       {
        $category = Category::find($id);
        return view('adminCategories.edit',compact('category'));
       }


       public function update(Request $request , $id)
       {

           $category = Category::find($id);
           $category->update( $request->all());

           return redirect()->route('categories.index')->with('status', 'Category Has Been updated');
           

       }

       public function destroy($id)
       {
        $category = Category::find($id)->delete();
        return redirect()->route('categories.index')->with('status', 'Category Has Been Deleted');
       }
    
}
