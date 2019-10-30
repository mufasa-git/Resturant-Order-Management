<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function isRole(){
        return $this->role;
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        /**
     * A user has only one token.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function token()
    {
        return $this->hasOne(UserToken::class);
    }

    protected static function getUserByEmail($value)
    {
        $user = self::where('email', $value)->first();
        return $user;
    }
    public function users(){
        return $this->hasMany(Order_Info::class);
    }
    

}
