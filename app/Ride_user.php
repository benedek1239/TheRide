<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ride_user extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ride_id', 'user_id', 'status', 'places'
    ];

    public function ride()
    {
        return $this->belongsTo('App\Ride');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}