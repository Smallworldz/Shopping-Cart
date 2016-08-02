<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests;

class ProductController extends Controller
{
    public function product($id){
        $products = Product::where('category_id',$id)->get()->toArray();
        $parent = Category::with('children')->where('category_id',0)->get()->toArray();
        return view('subcategory')->with('products',$products)->with('message',$parent);
//        return view('product');
//        dd($products);
    }
    public function viewproduct($id){
        $parent = Category::with('children')->where('category_id',0)->get()->toArray();
        $product_details =Product::find($id)->toArray();
        return view('product')->with('products',$product_details)->with('message',$parent);
    }
}
