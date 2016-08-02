<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Category;
use DB;
use Auth;
use App\User;
use App\Http\Requests;

class CartController extends Controller
{
    public function cart(Request $request){
        $user_id = $request['user_id'];
        $product_id = $request['product_id'];
        $quantity = $request['quantity'];
        $price = $request['product_price'];
        $old_quantity = Cart::where('user_id',$user_id)->get()->toArray();
        $false =false;
        if($old_quantity == null){
            echo "Null";
        }
        else {
            foreach ($old_quantity as $key => $value) {
                if ($value['product_id'] == $product_id) {
                    $quantity = $quantity + $value['quantity'];
                    $updatequantity = DB::table('carts')->where('product_id', $product_id)->update(array('quantity' => $quantity));
                    $false = true;
                }
            }
        }
        if ($false == false){
                $insert_cart = Cart::create(['user_id'=>$user_id ,'product_id'=>$product_id,'quantity'=>$quantity,'product_price'=>$price]);
        }

    }

    public function cartdelete(Request $request){
        $product_id = $request['product_id'];
        $user_id = $request['user_id'];
        $deletion = Cart::where('user_id',$user_id)->where('product_id',$product_id)->delete();
        print_r($deletion);
    }
    public  function mycart(){
        $cart = Cart::with('products')->where('order_id',0)->get();
        $parent = Category::with('children')->where('category_id',0)->get()->toArray();
       return view('mycart')->with('message',$parent)->with('cart',$cart);
    }
    public function update_quantity(Request $request){
        $cart_id = $request['id'];
        $quantity = $request['quantity'];
        $update = DB::table('carts')->where('id',$cart_id)->update(array('quantity' => $quantity));
    }

    public function checkout($total){
        $id = Auth::user()->id;
        $userdetails = User::find($id)->get();
        $cart = Cart::with('products')->get();
        $parent = Category::with('children')->where('category_id',0)->get()->toArray();
        return view('checkout')->with('cart',$cart)->with('message',$parent)->with('user',$userdetails)->with('total',$total);
    }
    public function order_place(Request $request){
        $name=$request['name'];
        $email = $request['email'];
        $mobile = $request['mobile'];
        $address = $request['address'];
        $zipcode = $request['zipcode'];
        $city = $request['city'];
        $user_id = $request['user_id'];
        $total =$request['total'];
        $insertion = Order::create(['address'=>$address,'email'=>$email,'mobile'=>$mobile,'user_id'=>$user_id,'mobile'=>$mobile,'total'=>$total]);
        $order = $insertion['id'];
        $updation = DB::table('carts')->where('user_id',$user_id)->where('order_id',0)->update(array('order_id' => $order));
        return redirect()->route('shopping.thank_you');
    }
    public function thanks(){
        $parent = Category::with('children')->where('category_id',0)->get()->toArray();
        return view('thank_you')->with('message',$parent);
    }
}
