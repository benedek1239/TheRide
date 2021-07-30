<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequiredRide extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'start_city_id', 'finish_city_id', 'start_time', 'notified'
    ];

}