<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_from', 'user_to', 'ride_id', 'rating'
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
