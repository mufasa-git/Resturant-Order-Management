<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Hash;
use Validator;
use Auth;

class UserController extends Controller
{
    //
    public function index(){
    	$users = User::all();
        return view('user/index')->with( 'users', $users );
    }
    public function create()
    {
        return view('user/new');
    }

	public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;   
        $user->email = $request->email;
        $role = $request->user_type;
        $user->user_type = $request->user_type;
        if($user->save())
        {

            Session::flash('message','User was successfully created');
            Session::flash('m-class','alert-success');
            
            $user->assignRole($role);
            return redirect('user');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('user/create');
        }
    }

    public function edit($id)
    {
        //
        $user = User::find($id);

        return view('user/edit')->with(['user' => $user]);
    }
 	public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;   
        $user->user_type = $request->user_type;
        $role = $request->user_type;
        $user->email = $request->email;
        
        if($user->save())
        {
            Session::flash('message','User was successfully updated');
            Session::flash('m-class','alert-success');
            $user->assignRole($role);
            return redirect('user');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('user/create');
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
        $user = User::all()->where('user_id','=', $id);

        if(count($user) > 0)
        {
            Session::flash('message','Cannot delete user while its user exists');
            Session::flash('m-class','alert-danger');
            return redirect('user');
        }    
        else
        {
            user::find($id)->delete();

            Session::flash('message','user was successfully deleted');
            Session::flash('m-class','alert-success');
            return redirect('user');
        }
    }
}
