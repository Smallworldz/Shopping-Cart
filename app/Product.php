<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;

class Product extends Model
{
    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function carts(){
        return $this->hasOne(Cart::class);
    }
}
