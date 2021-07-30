<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_from', 'user_to', 'type', 'places', 'ride_id', 'checked'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_from');
    }

    
    public function ride()
    {
        return $this->belongsTo('App\Ride');
    }
}
