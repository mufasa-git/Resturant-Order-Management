<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orders(){
        return $this->hasMany('App\Order','product_id');
    }
    public function order_lists(){
        return $this->hasMany('App\Order_list','product_id');
    }
}
