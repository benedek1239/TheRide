<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Plank\Mediable\Media;
use App\Http\Requests\UserNameRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use MediaUploader;

class UserController extends Controller
{

    public function show($lang, User $user)
    {
        return view('pages.user-settings', compact('user'));
    }

    //Upadate User name
    public function updateName(UserNameRequest $request, $lang, User $user)
    {
        User::where('id', $user->id)
        ->update(['name' => $request->input('name'),
        ]);

        return view('pages.user-settings', compact('user'));
    }

    //Update User password
    public function updatePassword(PasswordRequest $request, $lang, User $user){
        $badOldPassword = false;
        $hasher = app('hash');
        if ($hasher->check($request['password_old'], $user->password)) {
            User::where('id', $user->id)
            ->update(['password' => Hash::make($request['password_new']),
            ]);
            return view('pages.user-settings', compact('user'));

        }
        else{
            $badOldPassword = true;
            return view('pages.user-settings', compact('user'), ['badOldPassword' => $badOldPassword]);
        }
    }

    //Upadte profile picture
    public function update(Request $request, $lang, User $user)
    {

        if($request->file('media') != null){
            $media = MediaUploader::fromSource($request->file('media'))
            ->toDisk('public_uploads')
            ->toDirectory('storage/uploads')
            ->upload();
            $user->hasMedia('profile') ? $user->syncMedia($media, 'profile') : $user->attachMedia($media, 'profile');
        }
        elseif($request['avatar-counter'] != null){
            $avatarMedia = Media::where('avatar_counter', $request['avatar-counter'])->get();
            $user->hasMedia('profile') ? $user->syncMedia($avatarMedia->first(), 'profile') : $user->attachMedia($avatarMedia->first(), 'profile');
        }

        return view('pages.user-settings', compact('user'));

    }

    //Upadte profile picture
    public function getUserData($userId)
    {
        $user = User::find($userId);
        return response()->json([
            'imgSrc' => $user->hasMedia('profile') ? url('/') . '/' . $user->getMedia('profile')->first()->getDiskPath() : asset('images/blank.jpg'),
            'name'=>$user->name,
            'id' => $userId
        ]);

    }


}
