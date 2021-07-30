<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'places', 'price', 'comment', 'start_time', 'currency', 'calculated_price'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function across_cities()
    {
        return $this->hasMany('App\Across_city');
    }

    public function waypoints()
    {
        return $this->hasMany('App\Waypoint');
    }

}
