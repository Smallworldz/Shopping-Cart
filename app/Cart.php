<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Cart extends Model
{
    protected $fillable = ['user_id','product_id','quantity','product_price'];

    public function products(){
        return $this->hasMany(Product::class,'id','product_id');
    }
}
