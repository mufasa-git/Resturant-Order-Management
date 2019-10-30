<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    //
    public function tables(){
        return $this->hasOne(Order_Info::class);
    }
}
