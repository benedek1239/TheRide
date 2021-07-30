<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PassangerRequest;
use App\RequiredRide;
use Illuminate\Support\Facades\App;

class PassangerController extends Controller
{
    public function store(PassangerRequest $request)
    {
        
        $user = auth()->user();
        $data = RequiredRide::create([
            'user_id' => $user->id,
            'start_city_id' => $request->start_ride,
            'finish_city_id' => $request->finish_ride,
            'start_time' => $request->ridePassanger_date,
            'notified' => 0,
        ]);
        
        return route('suggested-rides',['lang' => app()->getLocale(),'idRequired' => $data->id]);
    }

    public function setRideWatcher($id, $notified){

        RequiredRide::where('id', $id)
        ->update(['notified' => $notified,
        ]);

    }
    
}
