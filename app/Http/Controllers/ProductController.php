<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function Index()
    {


        $products= Product::all();
        return response()->json($products);
    }
    // end method


    public function ProductStore(Request $request)
    {
    //     $validated = $request->validate(

    //         [
    //         'product_name' => 'required|unique:products',
    //         'price' => 'required',
    //     ],
    //     [

    //         'product_name.required'=>'Product Name is required',

    //         'product_name.unique'=>'AlreadyProduct exist',

    //         'price.required'=>'Product Price is required',

    //     ],

    // );


        $products = new Product();
        $products->product_name=$request->product_name;
        $products->price=$request->price;
        $products->save();
        return response()->json('Product created!');
    }
    // end method



    public function ProductEdit($id = null)
    {
        $productEdit = Product::find($id);
        return response()->json($productEdit);
    }
    // end method


    public function ProductUpdate(Request $request,$id)
    {
        $productUpdate = Product::find($id);
        $productUpdate->update($request->all());
        return response()->json('Product updated');
    }
    // end method





    public function ProductDelete($id = null)
    {
        $products = Product::find($id);
        $products->delete();
        return response()->json(' deleted!');
    }
    // end method


}
