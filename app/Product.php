<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function category_name(){
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function getMobileComputerProduct(){
       // return $this->hasMany('App\Category', 'id', 'category_id')->where('category_id', '=', 1);
    }
}
