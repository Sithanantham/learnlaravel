<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function category_name(){
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
