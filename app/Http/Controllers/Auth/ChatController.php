<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

use Auth;
use Redirect;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function index($lang, $userTo){
        if(Auth::check()){
            return view('pages.chat', ['userId' => auth()->user()->id, 'userTo' => $userTo]);
        }
        else{
            $errors = ['login' => 'Bejelentkezes'];
            $language= app()->getLocale();
            $url = Str::of('/')->append($language)->append('/login');
            return Redirect::to($url)->withErrors($errors);
        }
    }

    public function getUsers(){
        return User::all();
    }

}
