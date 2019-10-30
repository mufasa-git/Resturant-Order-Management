<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_list extends Model
{
    //
    public function order_info(){
        return $this->belongsTo(Order_Info::class);
    }
	public function product(){
        return $this->belongsTo('App\Product');

    }

}
