<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Order_list;

class Order_Info extends Model
{
    public function table(){
        return $this->belongsTo(Table::class);
    }
	public function user(){
        return $this->belongsTo(User::class);
    }
    public function order_lists(){
        return $this->hasMany(Order_list::class, 'order_info_id');
    }
}
