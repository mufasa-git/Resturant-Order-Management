<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Order_Info;
class Order_InfoController extends Controller
{
    //
    public function index()
    {
    	$order_infos = Order_Info::all();
        return view('waiter/index')->with( 'order_infos', $order_infos);
    }
    public function create()
    {
        return view('waiter/new');
    }
    public function store(Request $request)
    {
        // if($order_info->save())
        // {
        //     // Session::flash('message','Product was successfully created');
        //     // Session::flash('m-class','alert-success');
        return redirect('table');
        // }
        // else
        // {
        //     // Session::flash('message','Data is not saved');
        //     // Session::flash('m-class','alert-danger');
        //     return redirect('waiter/create');
        // }
    }
    public function bartender_thumbs(Request $request)
    {
        Session::flash('message', ' (Bartender) Dear waiter, Tabel #'.$request->tableid. ' is working on it!');
        Session::flash('m-class','alert-success');
        return 'ok';
    }
    public function bartender_check(Request $request)
    {
        Session::flash('message', ' (Bartender) Dear waiter, Tabel #'.$request->tableid. ' order is ready, please come pick it up and give it to customer!');
        Session::flash('m-class','alert-success');

        return 'ok';
    }

    public function kitchen_thumbs(Request $request)
    {
        Session::flash('message', ' (Kitchen) Dear waiter, Tabel #'.$request->tableid. ' is working on it!');
        Session::flash('m-class','alert-success');
        return 'ok';
    }
    public function kitchen_check(Request $request)
    {
        Session::flash('message', ' (Kitchen) Dear waiter, Tabel #'.$request->tableid. ' order is ready, please come pick it up and give it to customer!');
        Session::flash('m-class','alert-success');

        return 'ok';
    }

}
