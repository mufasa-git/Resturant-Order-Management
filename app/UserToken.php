<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class UserToken extends Model
{
    //

    protected $fillable = ['user_id', 'token'];

    /**
     * A token belongs to a registered user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function sendMail($request)
    {
        //grab user by the submitted email
        $user = User::getUserByEmail($request->get('email'));

        if(!$user) {
            return redirect('/login/magiclink')->with('error', 'User not foud. PLease sign up');
        }

        $url = url('/login/magiclink/' . $user->token->token . '?' . http_build_query([
            'remember' => $request->get('remember'),
            'email' => $request->get('email'),
        ]));
        Mail::send(['html' => 'auth.emails.magic'], ['link' => $url],
            function ($message) use ($user) {
                $message->from('info@gmail.com')
                        ->to($user->email)
                        ->subject('Click the magic-link to login');
            }
        );
    }

    public function getRouteKeyName()
    {
        return 'token';
    }

    public function isExpired()
    {
        return $this->created_at->diffInMinutes(Carbon::now()) > 5;
    }

    //Make sure the token indeed belongs to the user with that email address
    public function belongsToUser($email)
    {
        $user = User::getUserByEmail($email);

        if(!$user || $user->token == null) {
            //if no record was found or record found does not have a token
            return false;
        }

        //if record found has a token that matches what was sent in the email
        return ($this->token === $user->token->token);
    }
}
