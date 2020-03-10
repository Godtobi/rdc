<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'userID'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function agent()
    {
        return $this->hasOne('App\Models\Agent', 'user_id');
    }

    public function agency()
    {
        return $this->hasOne('App\Models\Agency', 'user_id');
    }

    public function collector()
    {
        return $this->hasOne('App\Models\Collector', 'user_id');
    }

    public function enforcer()
    {
        return $this->hasOne('App\Models\Enforcer', 'user_id');
    }

}
