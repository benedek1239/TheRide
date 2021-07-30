<?php

namespace App\Http\Controllers;
use App\Ride;
use App\Across_city;
use App\Ride_user;
use App\Waypoint;
use App\RequiredRide;
use App\Notification;
use Auth;
use Redirect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRideRequest;
use Illuminate\Support\Str;

class RideController extends Controller
{
    public function index($lang, $id){
        
        $ride = Ride::Where('id', $id)->get();

        $OGtitle = $ride[0]->across_cities[0]->city->name_hu . "->" . $ride[0]->across_cities[count($ride[0]->across_cities)-1]->city->name_hu;
        if($ride[0]->across_cities[0]->city->name_hu == ''){
            $OGtitle = $ride[0]->across_cities[0]->city->name_ro . "->" . $ride[0]->across_cities[count($ride[0]->across_cities)-1]->city->name_hu;
        }
        else if( $ride[0]->across_cities[count($ride[0]->across_cities)-1]->city->name_hu == ''){
            $OGtitle = $ride[0]->across_cities[0]->city->name_hu . "->" . $ride[0]->across_cities[count($ride[0]->across_cities)-1]->city->name_ro;
        }

        return view('pages.ride-information', ['ride' => $ride, 'OGtitle' => $OGtitle]);

    }

    //Suggesting Rides
    public function suggestedRides($lang, $idRequest){
        
        
        $requiredRide = RequiredRide::find($idRequest);
        $acrossCities = Across_city::all();
        $rides= array();
        $suggestedRidesId = array();
        
        $boll1 = false;
        $boll2 = false;
        $counter = 0;
        foreach($acrossCities as $acrossCitie){
            if($acrossCitie->city_id == $requiredRide->start_city_id){
                $startSequence = $acrossCitie->sequence;
                $startRideId=$acrossCitie->ride_id;
                $boll1=true;
            }
            if(($acrossCitie->city_id == $requiredRide->finish_city_id)){
                $finishSequence = $acrossCitie->sequence;
                $finishRideId=$acrossCitie->ride_id;
                $boll2 = true;
            }

            if($boll1==true && $boll2 == true){
                $boll1 = $boll2 = false;
                if(($startSequence - $finishSequence < 0) && ($startRideId == $finishRideId)){
                    // dd($requiredRide->start_time);
                    if((Ride::find($startRideId)->start_time) >= $requiredRide->start_time)
                        $suggestedRidesId[$counter++] = $startRideId;
                        
                }
                    
            }
            
        }
        $i=0;
        foreach($suggestedRidesId as $suggestedRideId){
            $rides[$i++] = Ride::find($suggestedRideId);
        }

        $rides = collect($rides)->sortBy('start_time')->all();
            
        return view('pages.suggestedRides',compact('rides'), ['idRequired' => $idRequest]);
        
    }

    public function store(CreateRideRequest $request){

        if($request->currency_type == "Free"){
            $calculatedPrice = 0;
        }
        elseif($request->currency_type == "Euro"){
            $calculatedPrice = $request->price_cost * 4.84;
        }
        elseif($request->currency_type == "Forint"){
            $calculatedPrice = $request->price_cost * 0.014;
        }
        else{
            $calculatedPrice = $request->price_cost;
        }

        //Store new Ride
        $user = auth()->user();
        $ride = Ride::create([
            'user_id' => $user->id,
            'places' => $request->places_number,
            'price' => $request->price_cost,
            'currency' => $request->currency_type,
            'comment' => $request->ride_comment,
            'start_time' => $request->formated_date,
            'calculated_price' => $calculatedPrice,
            
        ]);

        $ride->save();

        //Store new waypoints through the new Ride
        $waypointCounter = 0;
        foreach($request->all() as $key => $value) {
            if(Str::contains($key, 'waypoint')){
                ++$waypointCounter;
                $coordinates = explode(" ", $value);
                $waypoint = Waypoint::create([
                    'ride_id' => $ride->id,
                    'latitude' => $coordinates[0],
                    'longitude' => $coordinates[1],
                    'sequence' => $waypointCounter,
                ]);
                $waypoint->save();
            }
        }  

        //Store new between-cities through the new Ride
        $sequenceCounter = 0;
        foreach($request->all() as $key => $value) {
            if(Str::contains($key, 'between-cities')){
                $cities[$sequenceCounter] = $value;
                ++$sequenceCounter;
                $accross_city = Across_city::create([
                    'city_id' => $value,
                    'ride_id' => $ride->id,
                    'sequence' => $sequenceCounter,
                ]);
                $accross_city->save();
            }
        }

        //Store new ride_user with status 1 (driver)
        $ride_user = Ride_user::create([
            'ride_id' => $ride->id,
            'user_id' => $user->id,
            'status' => 1,
        ]);

        $ride_user->save();

        $required_rides = RequiredRide::all();

        //Go through all required rides
        foreach ($required_rides as $required_ride) {
            //Check if the new ride go through the start and finish city of the required ride
            if(in_array($required_ride->start_city_id, $cities) && in_array($required_ride->finish_city_id, $cities)){
                //Check if the finish city is after the start city in the new ride
                if(array_search($required_ride->start_city_id, $cities) < array_search($required_ride->finish_city_id, $cities)){
                    //Check if the date is okey
                    if((Ride::find($ride->id)->start_time) >= $required_ride->start_time){
                        //Check if the user turned on Ride watcher
                        if($required_ride->notified == 1){
							//Send the notification
                            $notification = Notification::create([
                                'user_from' => $ride->user_id,
                                'user_to' => $required_ride->user_id,
                                'ride_id' => $ride->id,
                                'type' => 4,
                            ]);
                        }
                    }
                }
            }
        }

        return redirect(route('navigation.rides', ['lang'=>app()->getLocale(), 'filter'=>'created_desc']));
    }
}
