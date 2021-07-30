<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Across_city extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id', 'ride_id', 'sequence'
    ];

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
