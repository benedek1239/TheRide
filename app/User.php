<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class User extends Authenticatable
{
    use Notifiable;
    use Mediable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rating', 'rating_counter'
    ];

    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
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


    public function not_seened_notifications_for_me()
    {
        return $this->hasMany('App\Notification', 'user_to')->where('checked','=', null);
    }

    public function notifications_for_me()
    {
        return $this->hasMany('App\Notification', 'user_to');
    }

    public function notifications_from_me()
    {
        return $this->hasMany('App\Notification', 'user_from');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating', 'user_to');
    }
    
}
