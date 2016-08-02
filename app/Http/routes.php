<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Category;
use App\User;
use Illuminate\Http\Response;


Route::get('/',['as'=>'shopping.home','uses'=>'UserController@home' ]);

Route::any('home',['as'=>'shopping.home','uses'=>'UserController@home']);

Route::post('register',['as'=>'shopping.register','uses'=>'RegisterController@register']);

Route::post('login',['as'=>'shopping.login','uses'=>'RegisterController@login']);

Route::get('logout',['as'=>'shopping.logout','uses'=>'UserController@signout']);

Route::get('subcategory/{product_id}',['as'=>'shopping.subcategory','uses'=>'ProductController@product']);

Route::post('cart',['as'=>'shopping.cart','uses'=>'CartController@cart']);

Route::post('cartdelete',['as'=>'shoppind.cartdelete','uses'=>'CartController@cartdelete']);

Route::get('/mycart',['as'=>'shopping.mycart','uses'=>'CartController@mycart']);

Route::get('/update_quantity',['as'=>'shopping.update_quanity','uses'=>'CartController@update_quantity']);

Route::get('/order/{total}',['as'=>'shopping.order','uses'=>'CartController@checkout']);

Route::post('/myorder',['as'=>'shopping.order_place','uses'=>'CartController@order_place']);

Route::get('/thank_you',['as'=>'shopping.thank_you','uses'=>'CartController@thanks']);

Route::get('/myorderdetails',['as'=>'shopping.myorderdetails','uses'=>'OrderController@myorder']);

Route::get('/myorder/{order_id}',['as'=>'shopping.order_details','uses'=>'OrderController@order_details']);

Route::get('/product/{product_id}',['as'=>'shopping.product','uses'=>'ProductController@viewproduct']);

Route::post('submit',function (){
    $validator = Validator::make(
        array(
            'name'=> Request::get('name')
        ),
        array(
            'name'=>'required|max:5'
        )
    );
    if($validator->fails()){
        return response()->json([
            'success'=>false,
            'errors'=>$validator->errors()->toArray()
        ]);
    }
    return response()->json(['success'=>true]);
});

Route::get('/fetch_data',['as'=>'shopping.fetch_data','uses'=>'UserController@fetch_data']);