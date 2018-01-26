<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductAjaxController extends Controller
{
    public function index() {
	    $products = Product::all();
	    return view('ajax.product.index')->with('products',$products);
	}

	public function show($product_id){
	    $product = Product::find($product_id);
	    return response()->json($product);
	}

	public function create(Request $request){   
	    $product = Product::create($request->input());
	    return response()->json($product);
	}

	public function update(Request $request,$product_id){
	    $product = Product::find($product_id);
	    $product->name = $request->name;
	    $product->details = $request->details;
	    $product->save();
	    return response()->json($product);
	}

	public function destroy($product_id){
	    $product = Product::destroy($product_id);
	    return response()->json($product);
	}
}
