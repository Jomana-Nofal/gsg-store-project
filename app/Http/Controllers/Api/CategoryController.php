<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
   public function index()
   {
        return Category::all();
   }



   public function show($id)
   {
       return Category::findOrFail($id);
   }



   public function store(Request $request)
   {
        $request->validate([
            'name' => 'required|string|max:255|min:3|unique:categories',
            'discription' => 'nullable|min:10',
            
        ]);

        $category = Category::create($request->all());
        return response()->json($category,200);
   }



   public function update(Request $request , $id)
   {
        $request->validate([
            'name' => 'required|string|max:255|min:3|unique:categories',
            'discription' => 'nullable|min:10',
            
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

            return Response::json([
                'message' => 'Category updated',
                'category' => $category,
            ]);
   }

   public function destroy($id)
   {
    $category = Category::findOrFail($id);
    $category->delete();
    return Response::json([
        'message' => 'Category deleted',
    ]);
   }


}
