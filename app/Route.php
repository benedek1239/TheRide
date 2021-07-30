<?php
# app/Route.php

namespace App;

class Route
{
    //Cities on a route
    protected $cities = [];
    //The id of the ride
    protected $rideId;

    /**
     * Construct the rout.
     *
     * @param array $items
     */
    public function __construct($cities = [], $rideId)
    {
        $this->cities = $cities;
        $this->$rideId = $rideId;
    }

    /**
     * Getter to get the cities on the route.
     *
     * @return array
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * Getter to get the ride id on the route.
     *
     * @return array
     */
    public function getRideId()
    {
        return $this->rideId;
    }

    /**
     * Check if the specified city is on the route.
     *
     * @param string $item
     * @return bool
     */
    public function hasCity($citiy)
    {
        return in_array($citiy, $this->cities);
    }

    /**
     * Remove a city from the route
     *
     * @return string
     */
    public function takeOneCity()
    {
        return array_shift($this->cities);
    }
    
    /**
     * Take all cities from the given route to this route
     *
     * @param box $box
     */
    public function citiesMergeTogether($route)
    {
        $this->cities = array_merge($this->cities, $route->getCities());
    }

    /**
     * Retrieve all cities from the route that start with the specified letter.
     *
     * @param string $letter
     * @return array
     */
    public function startsWith($letter)
    {
        return array_filter($this->cities, function ($city) use ($letter) {
            return stripos($city, $letter) === 0;
        });
    }
}