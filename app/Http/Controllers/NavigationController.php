<?php

namespace App\Http\Controllers;

use App\City;
use App\Ride;
use App\Ride_user;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Auth;
use Redirect;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Support\Str;

class NavigationController extends Controller
{
    
    public function homeIndex(){
        return view('pages.welcome');
    }

    public function resetPWIndex(){
        return view('auth.passwords.email');
    }

    public function termsIndex(){
        return view('pages.terms');
    }

    public function privacyIndex(){
        return view('pages.privacy');
    }

    public function rideIndex($lang, $filter){
        if($filter == "created_desc"){
            $rides = collect(Ride::all())->sortByDesc('created_at')->all();
        }
        elseif($filter == "created_asc"){
            $rides = collect(Ride::all())->sortBy('created_at')->all();
        }
        elseif($filter == "start_desc"){
            $rides = collect(Ride::all())->sortByDesc('start_time')->all();
        }
        elseif($filter == "start_asc"){
            $rides = collect(Ride::all())->sortBy('start_time')->all();
        }
        elseif($filter == "places_desc"){
            $rides = collect(Ride::all())->sortByDesc('places')->all();
        }
        elseif($filter == "places_asc"){
            $rides = collect(Ride::all())->sortBy('places')->all();
        }
        elseif($filter == "price_desc"){
            $rides = collect(Ride::all())->sortByDesc('calculated_price')->all();
        }
        elseif($filter == "price_asc"){
            $rides = collect(Ride::all())->sortBy('calculated_price')->all();
        }

        return view('pages.rides', ['rides' => $rides]);
    }

    public function rateIndex($lang, User $user){
        return view('pages.ratings', compact('user'));
    }


    public function historyIndex(){
        if(Auth::check()){
            $activeRides = collect(Ride_user::Where('user_id', auth()->user()->id)->get())->sortByDesc('created_at')->all();
            return view('pages.history', ['activeRides'=>$activeRides]);
        }
        $errors = ['login' => 'Bejelentkezes'];

        $language= app()->getLocale();
        $url = Str::of('/')->append($language)->append('/login');
        return Redirect::to($url)->withErrors($errors);

    }
    public function passangerIndex(){
        return view('pages.passanger');
    }
    public function rideCreateIndex(){
        $cities = City::all();
        return view('pages.ride-create', ['cities'=>$cities]);
    }
    
    public function activeRidesIndex(){
        if(Auth::check()){
            $activeRides = Ride_user::Where('user_id', auth()->user()->id)->get();
            return view('pages.active-rides', ['activeRides'=>$activeRides]);
        }

        $errors = ['login' => 'Bejelentkezes'];
        $language= app()->getLocale();
        $url = Str::of('/')->append($language)->append('/login');
        return Redirect::to($url)->withErrors($errors);
    }
    public function registerFormIndex(){
        return view('auth.register');
    }
}

?>