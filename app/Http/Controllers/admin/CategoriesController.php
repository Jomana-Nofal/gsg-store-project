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
        $categories = Category::paginate(10);
        return view('adminCategories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();
        return view('adminCategories.create', compact('category'));
    }

    public function store(Request $request)
    {
       
        $validation = $request->validate([
            'name' => 'required|string|max:255|min:3|unique:categories',
            'discription' => 'nullable|min:10',
            'status' => 'required|in:active,draft',
            'image' => 'required'
        ]);
        
        $category = new Category([
            'name' => $request['name'],
            'discription' => $request['discription'],
            'slug' => Str::slug($request['name']),
            'status' => $request['status'],

        ]);

        $category->save();
        return redirect()->route('categories.index')->with('status', 'New  Category Was Saved!');
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

           return redirect()->route('categories.index')->with('status', 'Category ($category->name) Has Been updated');
           

       }

       public function destroy($id)
       {
        $category = Category::find($id)->delete();
        return redirect()->route('categories.index')->with('status', 'Category ($category->name) Has Been Deleted');
       }

       public function trash()
       {
        $category = Category::onlyTrashed()->paginate();
        return view('adminCategories.trash', [
            'categories' => $category,
        ]);
        
       }

  
      public function forceDelete($id)
       {
           $category= Category::onlyTrashed()->findOrFail($id);
           $category->forceDelete();
           return redirect()->route('categories.index')->with('status', "Category ($category->name) deleted forever.");
                

       }

       public function restore(Request $request, ?Category $category = null)
       {
           if($category){
                $category->restore();

                return redirect()->route('categories.index')->with('status', "Category ($category->name) restored.");
                    
            }
        
                

       }
       
    
}
