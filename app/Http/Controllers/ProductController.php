<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\User;
use Hash;
use Validator;
use Auth;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product/index')->with( 'products', $products );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product();
        $product->product_name = $request->product_name;   
        $product->category = $request->category;
        $product->sub_category = $request->sub_category;
        $product->price = $request->price;        

        $lastId = $product->id;
        $picInfo = $request->photo;
        $picName = $lastId.$picInfo->getClientOriginalName();
        $folder = "productPhoto/";
        $picInfo->move($folder, $picName);
        $productPhoto = Product::find($lastId);
        $picUrl = $folder.$picName;
        $productPhoto = $picUrl;
        $product->product_photo = $picName;

        $product->extra_name = json_encode($request->extraName);
        $product->extra_price = json_encode($request->extraPrice);
        if($product->save())
        {

            Session::flash('message','Product was successfully created');
            Session::flash('m-class','alert-success');
            return redirect('product');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('product/create');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);

        return view('product/edit')->with(['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->product_name = $request->product_name;   
        $product->category = $request->category;
        $product->sub_category = $request->sub_category;
        $product->price = $request->price;


        $currentId = $product->id;
        $picInfo = $request->photo;
        // var_dump($request->all()); exit;
        $picName = $currentId.$picInfo->getClientOriginalName();
        $folder = "productPhoto/";
        $picInfo->move($folder, $picName);
        $productPhoto = Product::find($currentId);
        $picUrl = $folder.$picName;
        $productPhoto = $picUrl;
        $product->product_photo = $picName;

        $product->extra_name = json_encode($request->extraName);
        $product->extra_price = json_encode($request->extraPrice);
        if($product->save())
        {
            Session::flash('message','Product was successfully updated');
            Session::flash('m-class','alert-success');
            return redirect('product');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('product/create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::all()->where('product_id','=', $id);

        if(count($product) > 0)
        {
            Session::flash('message','Cannot delete product while its product exists');
            Session::flash('m-class','alert-danger');
            return redirect('product');
        }    
        else
        {
            product::find($id)->delete();

            Session::flash('message','product was successfully deleted');
            Session::flash('m-class','alert-success');
            return redirect('product');
        }
    }
}
