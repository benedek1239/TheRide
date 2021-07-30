<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationMail;
use App\Mail\MessageMail;
use Illuminate\Http\Request;
use App\User;
use App\Notification;
use App\Ride;
use App\Ride_user;
use Auth;


class NotificationController extends Controller
{
    public function index($lang, User $user)
    {
        $user = auth()->user();
        Notification::where('user_to', $user->id)
        ->update(['checked' => 1,
        ]);

        return view('pages.notifications', compact('user'));
    }

    public function getNotifications($id)
    {
        $matchThese = ['user_to' => $id, 'checked' => null];

        //Get all notifications
        $notifications = Notification::Where($matchThese)->get();

        // Fetch all records
        $notificationData['data'] = $notifications;
   
        echo json_encode($notificationData);
        exit;
     }


    public function getRide(Request $request)
    {
        if(Auth::check()){
            $notification = Notification::create([
                'user_from' => $request->input('user-from'),
                'user_to' => $request->input('user-to'),
                'ride_id' => $request->input('ride-id'),
                'type' => 1,
                'places' => $request->input('places-number'),
            ]);

            //send a mail about the notification
            $notificatedUser = User::Where('id', $request->input('user-to'))->get();
            $user = auth()->user();
            $text = $user->name . " wants to join your Ride!";

            Mail::to($notificatedUser[0]->email)->send(new NotificationMail($text));

            return redirect()->back();
        }
        else{
            $errors = ['login' => 'Bejelentkezes'];
            $language= app()->getLocale();
            $url = Str::of('/')->append($language)->append('/login');
            return Redirect::to($url)->withErrors($errors);
        }

    }

    public function acceptRide(Request $request, User $user)
    {
        if(Ride::where('id', $request->input('ride-id'))->get()[0]->places >= $request->input('places-number')){

            $notification = Notification::create([
                'user_from' => $user->id,
                'user_to' => $request->input('user-to'),
                'ride_id' => $request->input('ride-id'),
                'type' => 2,
            ]);
    
            $ride_user = Ride_user::create([
                'user_id' => $request->input('user-to'),
                'ride_id' => $request->input('ride-id'),
                'status' => 2,
                'places' => $request->input('places-number')
            ]);
    
            Ride::where('id', $request->input('ride-id'))
            ->decrement('places', $request->input('places-number'));
            
            Notification::where('id', $request->input('notification-id'))->delete();

            //send a mail about the notification
            $notificatedUser = User::Where('id', $request->input('user-to'))->get();
            $text = $user->name . " accepted your riding request!";
            Mail::to($notificatedUser[0]->email)->send(new NotificationMail($text));
        }

        return redirect()->back();

    }

    public function declineRide(Request $request, User $user)
    {
        $notification = Notification::create([
            'user_from' => $user->id,
            'user_to' => $request->input('user-to'),
            'ride_id' => $request->input('ride-id'),
            'type' => 3,
        ]);
        
        Notification::where('id', $request->input('notification-id'))->delete();

        //send a mail about the notification
        $notificatedUser = User::Where('id', $request->input('user-to'))->get();
        $text = $user->name . " declined your riding request!";
        Mail::to($notificatedUser[0]->email)->send(new NotificationMail($text));

        return redirect()->back();

    }

    public function deleteNotification(Request $request, User $user)
    {
        Notification::where('id', $request->input('notification-id'))->delete();

        return redirect()->back();
    }

    public function sendMessageEmail($userTo, $userFrom, $message)
    {
       $emailedUser = User::Where('id', $userTo)->get();
       $sendedUser = User::Where('id', $userFrom)->get();
       $text = $sendedUser[0]->name . " sent you a message!";

       Mail::to($emailedUser[0]->email)->send(new MessageMail($text, $message));
    }
    
}
