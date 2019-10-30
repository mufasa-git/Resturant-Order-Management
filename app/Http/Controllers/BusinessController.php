<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\User;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
class BusinessController extends Controller
{
    //
    public function index(){
    	$businesses = Business::all();
        return view('business/index')->with( 'businesses', $businesses );
    }

    public function store(Request $request)
    {

        $business = new Business();
        $business->tax1 = $request->tax1;   
        $business->tax2 = $request->tax2;
     
    
        if($business->save())
        {

            Session::flash('message','business was successfully created');
            Session::flash('m-class','alert-success');
            return redirect('business');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('business');
        }
    }
    public function update(Request $request, $id)
    {
        $business = Business::find($id);
        $business->tax1 = $request->tax1;   
        $business->tax2 = $request->tax2;
        Session::put('tax_info',['tax1' => $business->tax1, 'tax2' => $business->tax2]);

        if($business->save())
        {

            Session::flash('message','business was successfully created');
            Session::flash('m-class','alert-success');
            return redirect('business');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('business');
        }
    }
    public function edit($id)
    {
        //
        $business = Business::find($id);

        return view('business/edit')->with(['business' => $business]);
    }
}
