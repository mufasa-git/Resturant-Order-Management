<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserToken;
use Auth;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;
class MagicLoginController extends Controller
{

    public function show()
    {
        return view('auth.magic.login');
    }
    public function sendToken(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255|exists:users,email'
        ]);
    

        $user = User::getUserByEmail($request->get('email'));

        if (!$user) {
            return redirect('/login/magiclink')->with('error', 'User not foud. PLease sign up');
        }

        UserToken::create([
            'user_id' => $user->id,
            'token'   => Str::random(50)
        ]);   

        $this->validate($request, [
            'email' => 'required|email|max:255|exists:users,email'
        ]);
       
        UserToken::sendMail($request);


        return back()->with('success', 'We\'ve sent you a magic link! The link expires in 5 minutes');
    }


	public function authenticate(Request $request, UserToken $token)
	{
	    if ($token->isExpired()) {
	        $token->delete();
	        return redirect('/login/magiclink')->with('error', 'That magic link has expired.');
	    }

	    if (!$token->belongsToUser($request->email)) {
	        $token->delete();
	        return redirect('/login/magiclink')->with('error', 'Invalid magic link.');
	    }

	    Auth::login($token->user, $request->get('remember'));
	    $token->delete();
        $user = Auth::user();
        if($user->hasRole('admin')){
           return redirect('/admin');
        } else if($user->hasRole('waiter')){
            return redirect('/waiter');
        } else if($user->hasRole('bartender')){
            return redirect('/bartender');
        } else if($user->hasRole('kitchen')){
            return redirect('/kitchen');
        } else{
            return redirect('/home');
        }

	}

}
