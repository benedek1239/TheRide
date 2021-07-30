<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;
use App\Ride;
use App\Across_city;
use App\Waypoint;
use App\Ride_user;
use App\User;


class RideUserController extends Controller
{
    public function cancelRide(Request $request, User $user)
    {
        Ride::where('id', $request->input('ride-id'))
        ->increment('places', $request->input('places-number'));
        
        Ride_user::where('id', $request->input('ride-user-id'))->delete();

        $notification = Notification::create([
            'user_from' => $user->id,
            'user_to' => $request->input('user-to'),
            'ride_id' => $request->input('ride-id'),
            'type' => 5,
        ]);

        return redirect()->back();
    }   


    public function deleteRide(Request $request, User $user)
    {

        //Delete all previos notifications for the deleted ride id
        Notification::where('ride_id', $request->input('ride-id'))->delete();

        //Send notification for every passanger on this route
        $rideUsers = Ride_user::where('ride_id', $request->input('ride-id'))->get();
        //Go through all passanger
        foreach ($rideUsers as $rideUser) {
            //Skip the driver
            if($rideUser->user_id != $user->id){
                //Send the notification 
                $notification = Notification::create([
                    'user_from' => $user->id,
                    'user_to' => $rideUser->user_id,
                    'ride_id' => $request->input('ride-id'),
                    'type' => 6,
                ]);
            }
        }

        //Delete the ride_user for all passanger and the driver
        Ride_user::where('ride_id', $request->input('ride-id'))->delete();

        //Delete all the acroos cityes near the ride
        Across_city::where('ride_id', $request->input('ride-id'))->delete();

        //Delete all the waypoints near the ride
        Waypoint::where('ride_id', $request->input('ride-id'))->delete();

        //Delete the ride
        Ride::where('id', $request->input('ride-id'))->delete();

        return redirect()->back();
    } 
}
