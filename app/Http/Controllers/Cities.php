<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Redirect;
use Illuminate\Http\Request;
use App\City;
use Auth;
use Illuminate\Support\Str;


class Cities extends Controller
{
    public function index(){
        if(Auth::check()){
            $allCities = City::all();
            return view('pages.ride-create', compact('allCities'));
        }
        $errors = ['login' => 'Bejelentkezes'];
        $language= app()->getLocale();
        $url = Str::of('/')->append($language)->append('/login');
        return Redirect::to($url)->withErrors($errors);   
    }

    public function passangerIndex(){
        if(Auth::check()){
            $allCities = City::all();
            return view('pages.passanger', compact('allCities'));
        }
        $errors = ['login' => 'Bejelentkezes'];
        $language= app()->getLocale();
        $url = Str::of('/')->append($language)->append('/login');
        return Redirect::to($url)->withErrors($errors);
    }

    public function getCities(){
        return City::all();
    }

}
