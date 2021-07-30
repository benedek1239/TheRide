<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::group(['prefix' => '{lang?}', 'middleware' => 'localization'], function(){

    // User Authentication Routes
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // User Registration Routes
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // User Password Reset Routes
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    // User Verification Routes
    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

    Route::get('/', 'NavigationController@homeIndex')->name('navigation.home');
    Route::get('rides/{filter}', 'NavigationController@rideIndex')->name('navigation.rides');
    Route::get('history', 'NavigationController@historyIndex')->name('navigation.history');
    Route::get('passanger', 'Cities@passangerIndex')->name('navigation.passanger');
    Route::get('ride-create', 'Cities@index')->name('navigation.ride-create');
    Route::get('ratings', 'NavigationController@rateIndex')->name('navigation.ratings');
    Route::get('chat/{user_to}', 'ChatController@index')->name('navigation.chat');
    Route::get('reset-password', 'NavigationController@resetPWIndex')->name('navigation.password-reset');
    Route::resource('users', 'UserController')->only('show','update');
    Route::get('active-rides', 'NavigationController@activeRidesIndex')->name('navigation.active-rides');
    Route::get('terms', 'NavigationController@termsIndex')->name('navigation.terms');
    Route::get('privacy', 'NavigationController@privacyIndex')->name('navigation.privacy');

    Route::get('/load-data', 'Cities@getCities');
    Route::get('ride-informations/{id}', 'RideController@index')->name('ride-informations');
    Route::get('update-user/{user}', 'UserController@updateName')->name('users.update-name');
    Route::get('update-user-password/{user}', 'UserController@updatePassword')->name('users.update-password');
    Route::get('suggested-rides{idRequired}', 'RideController@suggestedRides')->name('suggested-rides');
    Route::resource('notifications', 'NotificationController')->only('index','update');

    //get a new ride
    Route::get('get-ride', 'NotificationController@getRide')->name('notifications.get-ride');

});

Route::get('/load-user/{userId}', 'UserController@getUserData');
Route::post('/store-passangerRide', 'PassangerController@store')->name('passanger.store');
Route::get('accept-ride/{user}', 'NotificationController@acceptRide')->name('notifications.accept-ride');
Route::get('decline-ride/{user}', 'NotificationController@declineRide')->name('notifications.decline-ride');
Route::get('delete-notification/{user}', 'NotificationController@deleteNotification')->name('notifications.delete-notification');
Route::get('/getNotifications/{id}','NotificationController@getNotifications');
Route::get('/setRideWatcher/{id}/{notified}','PassangerController@setRideWatcher');
Route::get('cancel-ride/{user}', 'RideUserController@cancelRide')->name('activeRides.cancel-ride');
Route::get('delete-ride/{user}', 'RideUserController@deleteRide')->name('activeRides.delete-ride');
Route::post('/giveRating','RateController@giveRating');
Route::get('/sendEmailMessage/{userTo}/{userFrom}/{message}','NotificationController@sendMessageEmail');
Route::post('/store-ride', 'RideController@store')->name('ride.store');

//facebook login
Route::get('/sign-in/facebook', 'Auth\LoginController@facebook');
Route::get('/sign-in/facebook/redirect', 'Auth\LoginController@facebookRedirect');


