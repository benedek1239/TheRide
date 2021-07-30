<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waypoint extends Model
{
    protected $fillable = [
        'ride_id', 'latitude', 'longitude', 'sequence'
    ];
}
