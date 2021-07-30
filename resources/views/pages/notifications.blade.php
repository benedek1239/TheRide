@extends('layouts.app')

@section('content')

<link href="{{ asset('css/notifications.css') }}" rel="stylesheet" type="text/css"/>


<?php  $user = auth()->user() ?>

<div class="d-flex flex-column-fluid">
    <div class=" container">
        <div class="notification-title">
            <span class="text-dark font-weight-bold font-size-bigger ">
                {{ __('notifications.notifications') }}
            </span>
        </div>

        @foreach($user->notifications_for_me->reverse() as $notification) 

            {{-- Ride request notification --}}
            @if($notification->type == 1)

                {{-- Hided top up bar unique for every notification --}}
                <div class="swal2-container swal2-center swal2-backdrop-show hidden" id="popup-container-{{$notification->id}}" style="overflow-y: auto;">
                    <div class="swal2-popup swal2-modal swal2-icon-warning swal2-show" style="display: flex;">

                        <div id="invalid-popup-{{$notification->id}}" class="hidden">
                            <div class="swal2-header">
                                <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                                    <div class="swal2-icon-content">!</div>
                                </div>
                            </div>
                            <div class="swal2-title">
                                {{ __('rides.not-enough-places') }}
                            </div>
                            <div class="swal2-actions">
                                <button class="swal2-confirm swal2-styled" onClick="hideTopup({{$notification->id}});" >OK</button>
                            </div>
                        </div>

                
                        <div id="main-popup-{{$notification->id}}">
                            <div class="swal2-header">
                                <div class="swal2-icon swal2-question" style="display: flex;">
                                    <div class="swal2-icon-content">?</div>
                                </div>
                            </div>
                            <div class="swal2-title">
                                {{ __('notifications.sure-to-accept') }}
                            </div>

                            <form action="{{route('notifications.accept-ride', ['user'=>auth()->user()])}}" method="GET">
                                @csrf
                                @method('GET')
                                <div class="swal2-actions">
                                    <button type="submit" class="swal2-confirm swal2-styled success-bg">{{ __('notifications.accept') }}</button>
                                    <button type="button" class="swal2-cancel swal2-styled" onClick="hideTopup({{$notification->id}}); return false;" >{{ __('rides.cancel') }}</button>
                                </div>
                                <input type='hidden' name="places-number" id="required_places_{{$notification->id}}" value="{{$notification->places}}">
                                <input type='hidden' id="available_places_{{$notification->id}}" value="{{$notification->ride->places}}">
                                <input type='hidden' name="user-to" value="{{$notification->user->id}}">
                                <input type='hidden' name="ride-id" value="{{$notification->ride->id}}">
                                <input type='hidden' name="notification-id" value="{{$notification->id}}">
                            </form>
                        </div>

                    </div>
                </div>

                <div class="swal2-container swal2-center swal2-backdrop-show hidden" id="popup-container-2-{{$notification->id}}" style="overflow-y: auto;">
                    <div class="swal2-popup swal2-modal swal2-icon-warning swal2-show" style="display: flex;">
                
                            <div class="swal2-header">
                                <div class="swal2-icon swal2-question" style="display: flex;">
                                    <div class="swal2-icon-content">?</div>
                                </div>
                            </div>
                            <div class="swal2-title">
                                {{ __('notifications.sure-to-decline') }}
                            </div>

                            <form action="{{route('notifications.decline-ride', ['user'=>auth()->user()])}}" method="GET">
                                @csrf
                                @method('GET')
                                <div class="swal2-actions">
                                    <button type="submit" class="swal2-confirm swal2-styled error-bg">{{ __('notifications.decline') }}</button>
                                    <button type="button" class="swal2-cancel swal2-styled" onClick="hideTopup2({{$notification->id}}); return false;" >{{ __('rides.cancel') }}</button>
                                </div>
                                <input type='hidden' name="user-to" value="{{$notification->user->id}}">
                                <input type='hidden' name="ride-id" value="{{$notification->ride->id}}">
                                <input type='hidden' name="notification-id" value="{{$notification->id}}">
                            </form>
                    </div>
                </div>

                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                {{ __('notifications.join-ride') }}
                            </h3>
                        </div>
                        <a target="_blank" href="{{ route('ride-informations', ['lang'=>app()->getLocale(), 'id'=>$notification->ride->id]) }}" class="d-flex align-items-center flex-wrap justify-content-between ">
                            <div class="route-process">
                                <span class="text-dark font-weight-bold font-size-lg ">
                                    @php 
                                    if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                        if($notification->ride->across_cities[0]->city->name_hu == ''):
                                            if($notification->ride->across_cities[0]->city->name_en == ''):
                                                echo $notification->ride->across_cities[0]->city->name_ro;
                                            else:
                                                echo $notification->ride->across_cities[0]->city->name_en;
                                            endif;
                                        else:
                                            echo $notification->ride->across_cities[0]->city->name_hu;
                                        endif;
                                        elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                            if($notification->ride->across_cities[0]->city->name_en == ''):
                                                if($notification->ride->across_cities[0]->city->name_hu == ''):
                                                    echo $notification->ride->across_cities[0]->city->name_ro;
                                                else:
                                                    echo $notification->ride->across_cities[0]->city->name_hu;
                                                endif;
                                            else:
                                                echo $notification->ride->across_cities[0]->city->name_en;
                                            endif;
                                        elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                            if($notification->ride->across_cities[0]->city->name_ro == ''):
                                                if($notification->ride->across_cities[0]->city->name_en == ''):
                                                    echo $notification->ride->across_cities[0]->city->name_hu;
                                                else:
                                                    echo $notification->ride->across_cities[0]->city->name_en;
                                                endif;
                                            else:
                                                echo $notification->ride->across_cities[0]->city->name_ro;
                                            endif;
                                        endif; 
                                    @endphp
                                </span>
                                <i class="fas fa-long-arrow-alt-right fa-2x right-arrow"></i>
                                <span class="text-dark font-weight-bold font-size-lg">
                                    @php 
                                    if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                        if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu == ''):
                                            if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en == ''):
                                                echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro;
                                            else:
                                                echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en;
                                            endif;
                                        else:
                                            echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu;
                                        endif;
                                        elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                            if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en == ''):
                                                if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu == ''):
                                                    echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro;
                                                else:
                                                    echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu;
                                                endif;
                                            else:
                                                echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en;
                                            endif;
                                        elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                            if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro == ''):
                                                if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en == ''):
                                                    echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu;
                                                else:
                                                    echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en;
                                                endif;
                                            else:
                                                echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro;
                                            endif;
                                        endif; 
                                    @endphp
                                </span>
                            </div>
                        </a>
                        <div class="my-lg-0 my-1 margin-topped">
                            <button class="btn btn-light-success font-weight-bold mr-2" onClick="showTopup({{$notification->id}})" ><i class="fas fa-check-circle"></i>{{ __('notifications.accept') }}</button>
                            <button class="btn btn-light-danger font-weight-bold mr-2"  onClick="showTopup2({{$notification->id}})" ><i class="fas fa-times-circle"></i>{{ __('notifications.decline') }}</button>
                            <a href="{{ route('navigation.chat', ['lang'=>app()->getLocale(), 'user_to'=>$notification->user->id]) }}" ><button class="btn btn-light-warning font-weight-bold mr-2" ><i class="fas fa-comments"></i>Chat</button></a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 mr-7">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img alt="Pic" src="{{ $notification->user->hasMedia('profile') ? url('/') . '/' . $notification->user->getMedia('profile')->first()->getDiskPath() : asset('images/blank.jpg') }}"/>
                                </div>
                            </div>
                
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                    <div class="mr-3">
                                        <div class="d-flex align-items-center text-dark font-size-h5 font-weight-bold mr-3">
                                            {{ $notification->user->name }}
                                        </div>
                                        <div class="d-flex flex-wrap my-2">
                                            <span class="text-dark font-weight-bold font-size-lg ">
                                                <i class="far fa-envelope yellowed"></i> &nbsp; {{ $notification->user->email}}
                                            </span>                               
                                        </div>
                                        <span class="text-dark font-weight-bold font-size-lg ">
                                            <i class="fas fa-star reded"></i> &nbsp; 
                                            @if($notification->user->rating_counter != 0)
                                                {{ number_format($notification->user->rating/$notification->user->rating_counter,1) }} ({{$notification->user->rating_counter}})
                                            @else
                                                {{ 0 }} ({{0}})
                                            @endif
                                        </span>
                                        <br>
                                        <span class="text-dark font-weight-bold font-size-lg ">
                                            @for($i=0; $i<$notification->places; $i++)
                                                <i class="fa fa-user fa-2x places-user-icon-ride"  aria-hidden="true"></i>
                                            @endfor
                                        </span>
                                        <br>
                                        <div class="notification-time">
                                            <span class="text-dark font-weight-bold font-size-lg ">
                                                {{ __('notifications.at') }} &nbsp;<i class="far fa-calendar-alt yellowed"></i> {{ substr($notification->created_at, 0, 10) }}&nbsp;&nbsp;<i class="far fa-clock blued"></i>{{ substr($notification->created_at, 10, 6) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
            
                            </div>
                            
                        </div>

                    </div>
                </div>

        {{-- Ride request accept notification --}}
        @elseif($notification->type == 2)

        <div class="swal2-container swal2-center swal2-backdrop-show hidden" id="popup-container-{{$notification->id}}" style="overflow-y: auto;">
            <div class="swal2-popup swal2-modal swal2-icon-warning swal2-show" style="display: flex;">
        
                    <div class="swal2-header">
                        <div class="swal2-icon swal2-question" style="display: flex;">
                            <div class="swal2-icon-content">?</div>
                        </div>
                    </div>

                    <div class="swal2-title">
                        {{ __('notifications.sure-to-delete') }}
                    </div>

                    <form action="{{route('notifications.delete-notification', ['user'=>auth()->user()])}}" method="GET">
                        @csrf
                        @method('GET')
                        <div class="swal2-actions">
                            <button type="submit" class="swal2-confirm swal2-styled">{{ __('notifications.delete') }}</button>
                            <button type="button" class="swal2-cancel swal2-styled" onClick="hideTopup({{$notification->id}}); return false;" >{{ __('rides.cancel') }}</button>
                        </div>
                        <input type='hidden' name="notification-id" value="{{$notification->id}}">
                    </form>

            </div>
        </div>

            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            {{ __('notifications.your-request') }}
                        </h3>
                        <h3 class="card-label greened-text">
                            <i class="fas fa-check-circle greened-text"></i>
                            {{ __('notifications.accepted') }}
                        </h3>
                    </div>
 

                    <div class="my-lg-0 my-1 margin-topped">
                        <button class="btn btn-light-danger font-weight-bold mr-2" onClick="showTopup({{$notification->id}})" ><i class="fas fa-trash-alt"></i>{{ __('notifications.delete') }}</button>
                        <a href="{{ route('navigation.chat', ['lang'=>app()->getLocale(), 'user_to'=>$notification->user->id]) }}" ><button class="btn btn-light-warning font-weight-bold mr-2" ><i class="fas fa-comments"></i>Chat</button></a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="notification-text">
                        <span class="text-dark font-weight-bold font-size-lg ">
                            <i class="flaticon2-calendar-3 blued"></i>
                            <span class="blued">{{ $notification->user->name }}</span> {{ __('notifications.accept-text') }}
                            <a target="_blank" href="{{ route('ride-informations', ['lang'=>app()->getLocale(), 'id'=>$notification->ride->id]) }}" class="d-flex align-items-center flex-wrap justify-content-between ">
                                <div class="route-process">
                                    <span class="text-dark font-weight-bold font-size-lg ">
                                        @php 
                                        if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                            if($notification->ride->across_cities[0]->city->name_hu == ''):
                                                if($notification->ride->across_cities[0]->city->name_en == ''):
                                                    echo $notification->ride->across_cities[0]->city->name_ro;
                                                else:
                                                    echo $notification->ride->across_cities[0]->city->name_en;
                                                endif;
                                            else:
                                                echo $notification->ride->across_cities[0]->city->name_hu;
                                            endif;
                                            elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                                if($notification->ride->across_cities[0]->city->name_en == ''):
                                                    if($notification->ride->across_cities[0]->city->name_hu == ''):
                                                        echo $notification->ride->across_cities[0]->city->name_ro;
                                                    else:
                                                        echo $notification->ride->across_cities[0]->city->name_hu;
                                                    endif;
                                                else:
                                                    echo $notification->ride->across_cities[0]->city->name_en;
                                                endif;
                                            elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                                if($notification->ride->across_cities[0]->city->name_ro == ''):
                                                    if($notification->ride->across_cities[0]->city->name_en == ''):
                                                        echo $notification->ride->across_cities[0]->city->name_hu;
                                                    else:
                                                        echo $notification->ride->across_cities[0]->city->name_en;
                                                    endif;
                                                else:
                                                    echo $notification->ride->across_cities[0]->city->name_ro;
                                                endif;
                                            endif; 
                                        @endphp
                                    </span>
                                    <i class="fas fa-long-arrow-alt-right fa-2x right-arrow"></i>
                                    <span class="text-dark font-weight-bold font-size-lg">
                                        @php 
                                        if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                            if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu == ''):
                                                if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en == ''):
                                                    echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro;
                                                else:
                                                    echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en;
                                                endif;
                                            else:
                                                echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu;
                                            endif;
                                            elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                                if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en == ''):
                                                    if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu == ''):
                                                        echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro;
                                                    else:
                                                        echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu;
                                                    endif;
                                                else:
                                                    echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en;
                                                endif;
                                            elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                                if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro == ''):
                                                    if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en == ''):
                                                        echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu;
                                                    else:
                                                        echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en;
                                                    endif;
                                                else:
                                                    echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro;
                                                endif;
                                            endif; 
                                        @endphp
                                    </span>
                                </div>
                            </a>
                        </span>

                    </div>
                    <div class="notification-time">
                        <span class="text-dark font-weight-bold font-size-lg ">
                            {{ __('notifications.at') }} &nbsp;<i class="far fa-calendar-alt yellowed"></i> {{ substr($notification->created_at, 0, 10) }}&nbsp;&nbsp;<i class="far fa-clock blued"></i>{{ substr($notification->created_at, 10, 6) }}
                        </span>
                    </div>
                </div>
            </div>

        {{-- Ride request decline notification --}}
        @elseif($notification->type == 3)

        <div class="swal2-container swal2-center swal2-backdrop-show hidden" id="popup-container-{{$notification->id}}" style="overflow-y: auto;">
            <div class="swal2-popup swal2-modal swal2-icon-warning swal2-show" style="display: flex;">
        
                    <div class="swal2-header">
                        <div class="swal2-icon swal2-question" style="display: flex;">
                            <div class="swal2-icon-content">?</div>
                        </div>
                    </div>

                    <div class="swal2-title">
                        {{ __('notifications.sure-to-delete') }}
                    </div>

                    <form action="{{route('notifications.delete-notification', ['user'=>auth()->user()])}}" method="GET">
                        @csrf
                        @method('GET')
                        <div class="swal2-actions">
                            <button type="submit" class="swal2-confirm swal2-styled">{{ __('notifications.delete') }}</button>
                            <button type="button" class="swal2-cancel swal2-styled" onClick="hideTopup({{$notification->id}}); return false;" >{{ __('rides.cancel') }}</button>
                        </div>
                        <input type='hidden' name="notification-id" value="{{$notification->id}}">
                    </form>

            </div>
        </div>

            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            {{ __('notifications.your-request') }}
                        </h3>
                        <h3 class="card-label reded-text">
                            <i class="fas fa-times-circle reded-text"></i>
                            {{ __('notifications.declined') }}
                        </h3>
                    </div>
 

                    <div class="my-lg-0 my-1 margin-topped">
                        <button class="btn btn-light-danger font-weight-bold mr-2" onClick="showTopup({{$notification->id}})" ><i class="fas fa-trash-alt"></i>{{ __('notifications.delete') }}</button>
                        <a href="{{ route('navigation.chat', ['lang'=>app()->getLocale(), 'user_to'=>$notification->user->id]) }}" ><button class="btn btn-light-warning font-weight-bold mr-2" ><i class="fas fa-comments"></i>Chat</button></a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="notification-text">
                        <span class="text-dark font-weight-bold font-size-lg ">
                            <i class="flaticon2-calendar-3 blued"></i>
                            <span class="blued">{{ $notification->user->name }}</span> {{ __('notifications.decline-text') }}  
                            <a target="_blank" href="{{ route('ride-informations', ['lang'=>app()->getLocale(), 'id'=>$notification->ride->id]) }}" class="d-flex align-items-center flex-wrap justify-content-between ">
                                &nbsp;
                                <div class="route-process">
                                    <span class="text-dark font-weight-bold font-size-lg ">
                                        @php 
                                        if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                            if($notification->ride->across_cities[0]->city->name_hu == ''):
                                                if($notification->ride->across_cities[0]->city->name_en == ''):
                                                    echo $notification->ride->across_cities[0]->city->name_ro;
                                                else:
                                                    echo $notification->ride->across_cities[0]->city->name_en;
                                                endif;
                                            else:
                                                echo $notification->ride->across_cities[0]->city->name_hu;
                                            endif;
                                            elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                                if($notification->ride->across_cities[0]->city->name_en == ''):
                                                    if($notification->ride->across_cities[0]->city->name_hu == ''):
                                                        echo $notification->ride->across_cities[0]->city->name_ro;
                                                    else:
                                                        echo $notification->ride->across_cities[0]->city->name_hu;
                                                    endif;
                                                else:
                                                    echo $notification->ride->across_cities[0]->city->name_en;
                                                endif;
                                            elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                                if($notification->ride->across_cities[0]->city->name_ro == ''):
                                                    if($notification->ride->across_cities[0]->city->name_en == ''):
                                                        echo $notification->ride->across_cities[0]->city->name_hu;
                                                    else:
                                                        echo $notification->ride->across_cities[0]->city->name_en;
                                                    endif;
                                                else:
                                                    echo $notification->ride->across_cities[0]->city->name_ro;
                                                endif;
                                            endif; 
                                        @endphp
                                    </span>
                                    <i class="fas fa-long-arrow-alt-right fa-2x right-arrow"></i>
                                    <span class="text-dark font-weight-bold font-size-lg">
                                        @php 
                                        if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                            if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu == ''):
                                                if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en == ''):
                                                    echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro;
                                                else:
                                                    echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en;
                                                endif;
                                            else:
                                                echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu;
                                            endif;
                                            elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                                if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en == ''):
                                                    if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu == ''):
                                                        echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro;
                                                    else:
                                                        echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu;
                                                    endif;
                                                else:
                                                    echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en;
                                                endif;
                                            elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                                if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro == ''):
                                                    if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en == ''):
                                                        echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu;
                                                    else:
                                                        echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en;
                                                    endif;
                                                else:
                                                    echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro;
                                                endif;
                                            endif; 
                                        @endphp
                                    </span>
                                </div>
                            </a>
                        </span>

                    </div>
                    <div class="notification-time">
                        <span class="text-dark font-weight-bold font-size-lg ">
                            {{ __('notifications.at') }} &nbsp;<i class="far fa-calendar-alt yellowed"></i> {{ substr($notification->created_at, 0, 10) }}&nbsp;&nbsp;<i class="far fa-clock blued"></i>{{ substr($notification->created_at, 10, 6) }}
                        </span>
                    </div>
                </div>
            </div>

        {{-- Find a ride for you --}}
        @elseif($notification->type == 4)
                
            <div class="swal2-container swal2-center swal2-backdrop-show hidden" id="popup-container-{{$notification->id}}" style="overflow-y: auto;">
                <div class="swal2-popup swal2-modal swal2-icon-warning swal2-show" style="display: flex;">
            
                        <div class="swal2-header">
                            <div class="swal2-icon swal2-question" style="display: flex;">
                                <div class="swal2-icon-content">?</div>
                            </div>
                        </div>
                        <div class="swal2-title">
                            {{ __('notifications.sure-to-delete') }}
                        </div>
                        <form action="{{route('notifications.delete-notification', ['user'=>auth()->user()])}}" method="GET">
                            @csrf
                            @method('GET')
                            <div class="swal2-actions">
                                <button type="submit" class="swal2-confirm swal2-styled">{{ __('notifications.delete') }}</button>
                                <button type="button" class="swal2-cancel swal2-styled" onClick="hideTopup({{$notification->id}}); return false;" >{{ __('rides.cancel') }}</button>
                            </div>
                            <input type='hidden' name="notification-id" value="{{$notification->id}}">
                        </form>
                </div>
            </div>

                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label greened-text">
                                {{ __('notifications.got-a-ride-for-you') }}
                            </h3>
                        </div>
    

                        <div class="my-lg-0 my-1 margin-topped">
                            <a href="{{ route('ride-informations', ['lang'=>app()->getLocale(), 'id'=>$notification->ride->id]) }}" class="btn btn-light-warning font-weight-bold mr-2" ><i class="fas fa-car"></i>{{ __('notifications.view') }}</a>
                            <button class="btn btn-light-danger font-weight-bold mr-2" onClick="showTopup({{$notification->id}})" ><i class="fas fa-trash-alt"></i>{{ __('notifications.delete') }}</button>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="notification-text">
                            <span class="text-dark font-weight-bold font-size-lg ">
                                <i class="flaticon2-calendar-3 blued"></i>
                                <span class="blued">{{ $notification->user->name }}</span> {{ __('notifications.made-ride') }}  
                            </span>

                        </div>
                        <div class="notification-time">
                            <span class="text-dark font-weight-bold font-size-lg ">
                                {{ __('notifications.at') }} &nbsp;<i class="far fa-calendar-alt yellowed"></i> {{ substr($notification->created_at, 0, 10) }}&nbsp;&nbsp;<i class="far fa-clock blued"></i>{{ substr($notification->created_at, 10, 6) }}
                            </span>
                        </div>
                    </div>
                </div>

            {{-- someone cancelled ride request --}}
            @elseif($notification->type == 5)

            <div class="swal2-container swal2-center swal2-backdrop-show hidden" id="popup-container-{{$notification->id}}" style="overflow-y: auto;">
                <div class="swal2-popup swal2-modal swal2-icon-warning swal2-show" style="display: flex;">
            
                        <div class="swal2-header">
                            <div class="swal2-icon swal2-question" style="display: flex;">
                                <div class="swal2-icon-content">?</div>
                            </div>
                        </div>
    
                        <div class="swal2-title">
                            {{ __('notifications.sure-to-delete') }}
                        </div>
    
                        <form action="{{route('notifications.delete-notification', ['user'=>auth()->user()])}}" method="GET">
                            @csrf
                            @method('GET')
                            <div class="swal2-actions">
                                <button type="submit" class="swal2-confirm swal2-styled">{{ __('notifications.delete') }}</button>
                                <button type="button" class="swal2-cancel swal2-styled" onClick="hideTopup({{$notification->id}}); return false;" >{{ __('rides.cancel') }}</button>
                            </div>
                            <input type='hidden' name="notification-id" value="{{$notification->id}}">
                        </form>
    
                </div>
            </div>

                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label reded-text">
                                {{ __('notifications.reservation-cancelled') }}
                            </h3>
                        </div>

                        <div class="my-lg-0 my-1 margin-topped">
                            <button class="btn btn-light-danger font-weight-bold mr-2" onClick="showTopup({{$notification->id}})" ><i class="fas fa-trash-alt"></i>{{ __('notifications.delete') }}</button>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="notification-text">
                            <span class="text-dark font-weight-bold font-size-lg ">
                                <i class="flaticon2-calendar-3 blued"></i>
                                <span class="blued">{{ $notification->user->name }}</span> {{ __('notifications.user-cancelled-reservation') }}
                            </span>
                                <a href="{{ route('ride-informations', ['lang'=>app()->getLocale(), 'id'=>$notification->ride->id]) }}">
                                    <div class="route-process inlined">
                                        <span class="text-dark font-weight-bold font-size-lg ">
                                            @php 
                                            if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                                if($notification->ride->across_cities[0]->city->name_hu == ''):
                                                    if($notification->ride->across_cities[0]->city->name_en == ''):
                                                        echo $notification->ride->across_cities[0]->city->name_ro;
                                                    else:
                                                        echo $notification->ride->across_cities[0]->city->name_en;
                                                    endif;
                                                else:
                                                    echo $notification->ride->across_cities[0]->city->name_hu;
                                                endif;
                                                elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                                    if($notification->ride->across_cities[0]->city->name_en == ''):
                                                        if($notification->ride->across_cities[0]->city->name_hu == ''):
                                                            echo $notification->ride->across_cities[0]->city->name_ro;
                                                        else:
                                                            echo $notification->ride->across_cities[0]->city->name_hu;
                                                        endif;
                                                    else:
                                                        echo $notification->ride->across_cities[0]->city->name_en;
                                                    endif;
                                                elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                                    if($notification->ride->across_cities[0]->city->name_ro == ''):
                                                        if($notification->ride->across_cities[0]->city->name_en == ''):
                                                            echo $notification->ride->across_cities[0]->city->name_hu;
                                                        else:
                                                            echo $notification->ride->across_cities[0]->city->name_en;
                                                        endif;
                                                    else:
                                                        echo $notification->ride->across_cities[0]->city->name_ro;
                                                    endif;
                                                endif; 
                                            @endphp
                                        </span>
                                        <i class="fas fa-long-arrow-alt-right fa-2x right-arrow"></i>
                                        <span class="text-dark font-weight-bold font-size-lg">
                                            @php 
                                            if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                                if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu == ''):
                                                    if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en == ''):
                                                        echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro;
                                                    else:
                                                        echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en;
                                                    endif;
                                                else:
                                                    echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu;
                                                endif;
                                                elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                                    if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en == ''):
                                                        if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu == ''):
                                                            echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro;
                                                        else:
                                                            echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu;
                                                        endif;
                                                    else:
                                                        echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en;
                                                    endif;
                                                elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                                    if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro == ''):
                                                        if($notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en == ''):
                                                            echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_hu;
                                                        else:
                                                            echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_en;
                                                        endif;
                                                    else:
                                                        echo $notification->ride->across_cities[count($notification->ride->across_cities)-1]->city->name_ro;
                                                    endif;
                                                endif; 
                                            @endphp
                                        </span>
                                    </div>
                                </a>
                            </div>
                        <div class="notification-time">
                            <span class="text-dark font-weight-bold font-size-lg ">
                                {{ __('notifications.at') }} &nbsp;<i class="far fa-calendar-alt yellowed"></i> {{ substr($notification->created_at, 0, 10) }}&nbsp;&nbsp;<i class="far fa-clock blued"></i>{{ substr($notification->created_at, 10, 6) }}
                            </span>
                        </div>
                    </div>
                </div>
                
            {{-- someone delete a ride in whar you are a passanger --}}
            @elseif($notification->type == 6)

            <div class="swal2-container swal2-center swal2-backdrop-show hidden" id="popup-container-{{$notification->id}}" style="overflow-y: auto;">
                <div class="swal2-popup swal2-modal swal2-icon-warning swal2-show" style="display: flex;">
            
                        <div class="swal2-header">
                            <div class="swal2-icon swal2-question" style="display: flex;">
                                <div class="swal2-icon-content">?</div>
                            </div>
                        </div>
    
                        <div class="swal2-title">
                            {{ __('notifications.sure-to-delete') }}
                        </div>
    
                        <form action="{{route('notifications.delete-notification', ['user'=>auth()->user()])}}" method="GET">
                            @csrf
                            @method('GET')
                            <div class="swal2-actions">
                                <button type="submit" class="swal2-confirm swal2-styled">{{ __('notifications.delete') }}</button>
                                <button type="button" class="swal2-cancel swal2-styled" onClick="hideTopup({{$notification->id}}); return false;" >{{ __('rides.cancel') }}</button>
                            </div>
                            <input type='hidden' name="notification-id" value="{{$notification->id}}">
                        </form>
    
                </div>
            </div>

            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label reded-text">
                            {{ __('notifications.ride-deleted') }}
                        </h3>
                    </div>


                    <div class="my-lg-0 my-1 margin-topped">
                        <button class="btn btn-light-danger font-weight-bold mr-2" onClick="showTopup({{$notification->id}})" ><i class="fas fa-trash-alt"></i>{{ __('notifications.delete') }}</button>
                    </div>

                </div>
                <div class="card-body">
                    <div class="notification-text">
                        <span class="text-dark font-weight-bold font-size-lg ">
                            <i class="flaticon2-calendar-3 blued"></i>
                            <span class="blued">{{ $notification->user->name }}</span> {{ __('notifications.deleted-a-ride') }}  
                        </span>
                        <br>
                        <span class="text-dark font-weight-bold font-size-lg ">
                            {{ __('notifications.in-the') }}   <a href="{{ route('navigation.active-rides', ['lang'=>app()->getLocale()]) }}">{{ __('menus.active-rides') }}</a> {{ __('notifications.see-your-rides') }}
                        </span>
                    </div>
                    <div class="notification-time">
                        <span class="text-dark font-weight-bold font-size-lg ">
                            {{ __('notifications.at') }} &nbsp;<i class="far fa-calendar-alt yellowed"></i> {{ substr($notification->created_at, 0, 10) }}&nbsp;&nbsp;<i class="far fa-clock blued"></i>{{ substr($notification->created_at, 10, 6) }}
                        </span>
                    </div>
                </div>
            </div>

                            
            {{-- someone sended rated you --}}
            @elseif($notification->type == 7)

            <div class="swal2-container swal2-center swal2-backdrop-show hidden" id="popup-container-{{$notification->id}}" style="overflow-y: auto;">
                <div class="swal2-popup swal2-modal swal2-icon-warning swal2-show" style="display: flex;">
            
                        <div class="swal2-header">
                            <div class="swal2-icon swal2-question" style="display: flex;">
                                <div class="swal2-icon-content">?</div>
                            </div>
                        </div>
    
                        <div class="swal2-title">
                            {{ __('notifications.sure-to-delete') }}
                        </div>
    
                        <form action="{{route('notifications.delete-notification', ['user'=>auth()->user()])}}" method="GET">
                            @csrf
                            @method('GET')
                            <div class="swal2-actions">
                                <button type="submit" class="swal2-confirm swal2-styled">{{ __('notifications.delete') }}</button>
                                <button type="button" class="swal2-cancel swal2-styled" onClick="hideTopup({{$notification->id}}); return false;" >{{ __('rides.cancel') }}</button>
                            </div>
                            <input type='hidden' name="notification-id" value="{{$notification->id}}">
                        </form>
    
                </div>
            </div>

            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label greened-text">
                            {{ __('notifications.got-rating') }}
                            <i class="flaticon-star greened-text"></i>
                        </h3>
                    </div>


                    <div class="my-lg-0 my-1 margin-topped">
                        <button class="btn btn-light-danger font-weight-bold mr-2" onClick="showTopup({{$notification->id}})" ><i class="fas fa-trash-alt"></i>{{ __('notifications.delete') }}</button>
                    </div>

                </div>
                <div class="card-body">
                    <div class="notification-text">
                        <span class="text-dark font-weight-bold font-size-lg ">
                            <i class="flaticon2-calendar-3 blued"></i>
                            <span class="blued">{{ $notification->user->name }}</span> {{ __('notifications.sended-a-rating') }}  
                            <a href="{{ route('navigation.ratings', ['lang'=>app()->getLocale(), 'user' => auth()->id()]) }}">{{ __('notifications.ratings') }}</a>
                                {{ __('notifications.on-menu') }}
                        </span>
                        <br>
                        <span class="text-dark font-weight-bold font-size-lg ">
                            {{ __('notifications.in-the') }}   <a href="{{ route('navigation.history', ['lang'=>app()->getLocale()]) }}">{{ __('menus.history') }}</a>
                            {{ __('notifications.can-give-rating') }}
                        </span>
                    </div>
                    <div class="notification-time">
                        <span class="text-dark font-weight-bold font-size-lg ">
                            {{ __('notifications.at') }} &nbsp;<i class="far fa-calendar-alt yellowed"></i> {{ substr($notification->created_at, 0, 10) }}&nbsp;&nbsp;<i class="far fa-clock blued"></i>{{ substr($notification->created_at, 10, 6) }}
                        </span>
                    </div>
                </div>
            </div>

            @endif
        @endforeach
    </div>
</div>

<script>

    function showTopup(notification_id){
        document.getElementById(`popup-container-${notification_id}`).classList.remove('hidden');
        if(document.getElementById(`required_places_${notification_id}`).value > document.getElementById(`available_places_${notification_id}`).value){
            document.getElementById(`invalid-popup-${notification_id}`).classList.remove('hidden');
            document.getElementById(`main-popup-${notification_id}`).classList.add('hidden');
        }
        else{
            document.getElementById(`invalid-popup-${notification_id}`).classList.add('hidden');
            document.getElementById(`main-popup-${notification_id}`).classList.remove('hidden'); 
        }
    }

    function hideTopup(notification_id){
        document.getElementById(`popup-container-${notification_id}`).classList.add('hidden');
    }

    function showTopup2(notification_id){
        document.getElementById(`popup-container-2-${notification_id}`).classList.remove('hidden');
    }

    function hideTopup2(notification_id){
        document.getElementById(`popup-container-2-${notification_id}`).classList.add('hidden');
    }

</script>

@endsection

