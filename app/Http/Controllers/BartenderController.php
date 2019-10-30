<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order_list;
use App\Table;
use App\Order_Info;
use App\Product;
class BartenderController extends Controller
{
    //

    public function index()
    {
        $order_infos = Order_Info::where('status', 0)->get();
        $order_lists = Order_list::join('order__infos', 'order_lists.order_info_id', '=', 'order__infos.id')->get();
        return view('bartender/index', compact('order_lists', 'order_infos'));
    }

}
