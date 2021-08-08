<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function create()
    {
        return view('adminProducts.create');
    }

    public function index()
    {
        $products = Product::all();
        return view('adminProducts.index',compact('products'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            // 'category_id' => 'required|int|exists:categories,id',
            'description' => 'nullable',
            'image' => 'nullable',
            'price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'quantity' => 'nullable|int|min:0',
            'sku' => 'nullable|unique:products,sku',
            'width' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'status' => 'required|in:active,draft',
        ]);
       $request->merge([
            'slug' => Str::slug($request->post('name')),
            'category_id' =>1,
        ]);
        $product = Product::create($request->all());
        return redirect()->back()
            ->with('status', "Product ($product->name) created.");
    }

    public function destroy($id)
    {
     $products = Product::find($id)->delete();
     return redirect()->route('product.index')->with('status', 'Category  Has Been Deleted');
    }

    public function edit($id)
    {
     $products = Product::find($id);
    return view('adminProducts.edit',compact('products'));
    }

    public function update(Request $request , $id)
    {

        $product = Product::find($id);
        $product->update( $request->all());

        return redirect()->route('product.index')->with('status', 'Product  Has Been updated');
        

    }
}
