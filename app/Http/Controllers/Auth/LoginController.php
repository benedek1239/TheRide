<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Socialite;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use File; 
use Plank\Mediable\Media;
use MediaUploader;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

      /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->route('navigation.home', ['lang'=>app()->getLocale()]);
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        $this->guard()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        if ($response = $this->loggedOut(request())) {
            return $response;
        }

        return request()->wantsJson()
            ? new Response('', 204)
            : redirect()->route('navigation.home', ['lang'=>app()->getLocale()]);
    }

    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        $user = Socialite::driver('facebook')->user();

        $fileContents = file_get_contents($user->avatar_original . "&access_token={$user->token}");
        File::put(public_path() . '/storage/uploads' . $user->getId() . ".jpg", $fileContents);

        $picture = public_path('storage/uploads' . $user->getId() . ".jpg");

        //check if the user exits already, to know upload profile picture or not
        $userInDB = User::where('email', '=', $user->email)->first();

        if($userInDB === null){
            $uploadProfilePicture = true;
        }
        else{
            $uploadProfilePicture = false;
        }


        $user = User::firstOrCreate([
            'email' => $user->email,
        ],[
            'name' => $user->name,
            'password' => Hash::make(Str::random(24)),
            'rating' => 0,
            'rating_counter' => 0,
        ]);

        if($uploadProfilePicture){
            $media = MediaUploader::fromSource($picture)
            ->toDisk('public_uploads')
            ->toDirectory('storage/uploads')
            ->upload();
            $user->hasMedia('profile') ? $user->syncMedia($media, 'profile') : $user->attachMedia($media, 'profile');
        }

        Auth::login($user, true);

        return redirect('navigation.home');
    }
}
