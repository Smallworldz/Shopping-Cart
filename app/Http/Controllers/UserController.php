<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Http\Requests;

class UserController extends Controller
{
    public function signout(){
        Auth::logout();
        return redirect()->route('shopping.home');
    }
    public function home(Request $request)
    {
        $parent = Category::with('children')->where('category_id',0)->get()->toArray();
        $product = Product::with('carts')->take(6)->get()->toArray();
        return view('home')->with('message',$parent)->with('product',$product);
    }
    public function fetch_data(Request $request){
        $quantity = $request['quantity'];
        $offset = $request['offset'];
        $data = Product::with('carts')->skip($offset)->take(5)->get()->toArray();
        return response($data);
    }
}
