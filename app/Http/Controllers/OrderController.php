<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Category;
use App\Http\Requests;

class OrderController extends Controller
{
    public function myorder(){
        $id = Auth::user()->id;
        $parent = Category::with('children')->where('category_id',0)->get()->toArray();
        $order_details = Order::where('user_id',$id)->get();
        $quantity = Cart::where('user_id',$id)->where('order_id','!=',0)->get()->toArray();
        $no_quantity= 0;
        foreach($quantity as $key => $value){
            $no_quantity = $no_quantity + $value['quantity'];
        }
        return view('order')->with('orders',$order_details)->with('message',$parent)->with('quantity',$no_quantity);
    }
    public function order_details($order_id){
        $parent = Category::with('children')->where('category_id',0)->get()->toArray();
        $cart_details = Cart::with('products')->where('order_id',$order_id)->get()->toArray();
        return view('order_details')->with('order_details',$cart_details)->with('message',$parent);
    }
}
