<?php

namespace App\Http\Controllers;

use App\Rating;
use App\User;
use App\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function giveRating(Request $data){
        //Create rating element
        $rating = Rating::create([
            'user_from' => $data['user_from'],
            'user_to' => $data['user_to'],
            'ride_id' => $data['ride_id'],
            'rating' => $data['rating'],
        ]);

        //Crate notification on the new rating element
        $notification = Notification::create([
            'user_from' => $data['user_from'],
            'user_to' => $data['user_to'],
            'ride_id' => $data['ride_id'],
            'type' => 7,
        ]);

        //Upadte user rating
        User::where('id', $data['user_to'])
        ->increment('rating_counter', 1);

        User::where('id', $data['user_to'])
        ->increment('rating', $data['rating']);
    }
}
