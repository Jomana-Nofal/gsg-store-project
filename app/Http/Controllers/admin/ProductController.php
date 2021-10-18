<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('adminProducts.create',compact('categories'));
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
            'category_id' => 'required|int|exists:categories,id',
            'description' => 'nullable',
            'price' => 'nullable|numeric|min:0',
            'image'=>'required',
            'sale_price' => 'nullable|numeric|min:0',
            'quantity' => 'nullable|int|min:0',
            'sku' => 'nullable|unique:products,sku',
            'width' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'status' => 'required|in:active,draft',
        ]);

        $newImageName= time().'-'.$request->name.'-'.$request->image->extension();
        $request->image->move(public_path('images'),$newImageName);


        $product = new Product([
            'name' =>$request->name,
            'category_id' =>$request->category_id ,
            'description' =>$request->description ,
            'price' => $request->price,
            'image_path'=>$newImageName,
            'sale_price' =>$request->sale_price ,
            'quantity' => $request->quantity,
            'sku' =>$request->sku,
            'slug'=> Str::slug($request['name']),
            'width' =>$request->width,
            'height' =>$request->height ,
            'length' =>$request->length ,
            'weight' =>$request->weight,
            'status' =>$request->status ,

        ]);
        $product->save();
        return redirect()->back()->with('status', "Product ($product->name) created.");
               
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('adminProducts.edit',compact('products'));
    }

    public function update(Request $request , $id)
    {

        $product = Product::find($id);
        if($request->image){
            $newImageName= time().'-'.$request->name.'-'.$request->image->extension();
            $request->image->move(public_path('images'),$newImageName);
            $product->update([
                'image_path' =>$newImageName,
            ]);

            $product->save();
        }else{
        
        $product->update( $request->all());
        }
        return redirect()->route('product.index')->with('status', "Product ($request->name) Has Been updated");
        

    }
    public function show(Request $request,$slug){
        $product = Product::where('slug',$slug)->first();
        return view('user.productDetails',compact('product'));
    }

    public function destroy($id)
    {
     $products = Product::find($id)->delete();
     return redirect()->route('product.index');
    }


    public function category($id)
    {
        $products = Product::where('category_id','=',$id)->get();
        return view('user.categoryProducts',compact('products'));
    }
}
