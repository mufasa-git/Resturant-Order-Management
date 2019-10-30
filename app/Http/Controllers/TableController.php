<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Table;
use App\Order_Info;
use App\Product;
use App\User;
use App\Order;
use App\Order_list;
use App\Business;
// use DB;
use Auth;
use Log;
class TableController extends Controller
{
    //
    public function index()
    {
    	$tables = Table::all();
    	$order_infos = Order_Info::all();
        return view('table/index')->with( 'tables', $tables);
    }
    public function create()
    {
        $info = Session::get('lastId');   	
        return view('table/new');
    }
    public function show_drink()
    {
        return view('table/drink');
    }
    public function show_food()
    {
        return view('table/food');
    }
    public function show_finish()
    {
    	$order_lists = Order_list::all();
    	$info = Session::get('lastId');   	
    	$table_id = $info['table_id'];
    	$table = Table::find($table_id);
        return view('table/finish', compact('table', 'order_lists'));
    }
    public function drink_alcoh()
    {
    	$products = Product::all();
        return view('table/drink_alcoh')->with('products', $products);
    }    
    public function drink_non()
    {
	   	$products = Product::all();
        return view('table/drink_non')->with('products', $products);
    }
    public function food_starter()
    {
	   	$products = Product::all();
        return view('table/food_starter')->with('products', $products);
    }
    public function food_main()
    {
	   	$products = Product::all();
        return view('table/food_main')->with('products', $products);
    }
    public function food_dessert()
    {
	   	$products = Product::all();
        return view('table/food_dessert')->with('products', $products);
    }
    public function another_drink()
    {
        return view('table/another_drink');
    }
    public function another_food()
    {
        return view('table/another_food');
    }
    public function quantity_confirm($id)
    {
		$products = Product::all();
		$product = Product::find($id);
		return view('table/quantity_confirm')->with('product', $product);    	
    }
    public function table_status(Request $request)
    {	
    	$tbl_id = $request->tableid;
    	$table = Table::find($tbl_id);
    	$table->displayed = filter_var($request->status, FILTER_VALIDATE_BOOLEAN);
        $table->save();
   
		$prev_order = Session::get('prvOrder');
    	$tax_num = $prev_order['tax_num'];
    	$client_name = $prev_order['client_name'];
  
        $userId = Auth::id();
       
        $order_info = new Order_Info();
        $order_info->tax_num = $tax_num;
        $order_info->client_name = $client_name;
        $order_info->table_id = $tbl_id;
        $order_info->user_id = $userId;
        $order_info->save();
		
		Session::put('lastId',['order_info_id' => $order_info->id, 'table_id' => $tbl_id]);
		return 'ok';
    }
    public function edit_order(Request $request)
    {
    	$tables = Table::all();
    	return view('table/edit_order')->with('tables', $tables);
    }
    public function order_1(Request $request){
		$table_id = $request->tableid;
    	$order_info = Order_Info::where('table_id', $table_id)->first();
        Session::put('lastId',['order_info_id' => $order_info->id, 'table_id' => $table_id]);
    }
    public function edit_flag(Request $request)
    {
		Session::put('flag',['flag' => $request->flag]);
    	return 'ok';
    }
    public function order_list(Request $request)
    {
    	$info = Session::get('lastId');   	
    	$order_info_id = $info['order_info_id'];
    	$quantity = $request->quantity;
    	$product_id = $request->product_id;
		$business = Business::find(1);

		$order_list = new Order_list();
		$order_list->order_info_id = $order_info_id;
		$order_list->product_id = $product_id;
		$order_list->quantity = $quantity;
		$order_list->price_sum = $order_list->product->price * $order_list->quantity;
		$order_list->tax1 = $business->tax1;
		$order_list->tax2 = $business->tax2;
		$order_list->save();    	
        return 'ok';
    }
    public function order_info(Request $request)
    {
		Session::put('prvOrder',['tax_num' => $request->tax_num, 'client_name'=> $request->client_name]);
        return 'ok';
    }
    public function final_confirm(Request $request)
    {
    	Log::info($request->order_status);
    	$order_info = Order_Info::find($request->id);
		$order_info->status = filter_var($request->order_status, FILTER_VALIDATE_BOOLEAN);
		$order_info->save();
		$table = Table::find($order_info->table_id);
		$table->displayed = filter_var($request->table_status, FILTER_VALIDATE_BOOLEAN);
		$table->save();
    	return 'ok';
    }
    public function store(Request $request)
    {
        $table = new Table();
        if($order_info->save())
        {

            Session::flash('message','Product was successfully created');
            Session::flash('m-class','alert-success');
            return redirect('table');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('table/create');
        }
    }
}
