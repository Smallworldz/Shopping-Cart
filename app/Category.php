<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function children()
    {
        return $this->hasMany('App\Category','category_id');
    }
    public function parent()
    {
        return $this->belongsTo('App\Category','category_id');
    }
}
