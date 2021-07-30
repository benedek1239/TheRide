@extends('layouts.app')

@section('content')

<link href="{{ asset('css/ride-information.css') }}" rel="stylesheet" type="text/css"/>

<div class="swal2-container swal2-center swal2-backdrop-show hidden" id="popup-container" style="overflow-y: auto;">
    <div class="swal2-popup swal2-modal swal2-icon-warning swal2-show" style="display: flex;">

        <div id="invalid-popup" class="hidden">
            <div class="swal2-header">
                <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                    <div class="swal2-icon-content">!</div>
                </div>
            </div>
            <div class="swal2-title">
                {{ __('rides.own-route') }}
            </div>
            <div class="swal2-actions">
                <button class="swal2-confirm swal2-styled" id="cancel-ride-button-2">OK</button>
            </div>
        </div>

        <div id="first-popup">
            <div class="swal2-header">
                <div class="d-flex places-user-icon-group">
                    @for($i=0;$i<$ride->first()->places;$i++)
                        <i class="fa fa-user fa-4x places-user-icon-get-ride" id="get-ride-places-icon-{{ $i }}" aria-hidden="true"></i>
                    @endfor
                <input type="hidden" value="{{$ride->first()->places}}" id="number-of-available-places">
                </div>
                <div class="swal2-title">
                    {{ __('rides.how-many-people') }}
                </div>
                <div class="swal2-actions">
                    <button type="submit" class="swal2-confirm swal2-styled" id="main-get-ride-button">{{ __('rides.next') }}</button>
                    <button class="swal2-cancel swal2-styled" id="cancel-ride-button">{{ __('rides.cancel') }}</button>
                </div>
            </div>
        </div>

        <div id="second-popup" class="hidden">
            <div class="swal2-header">
                <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                    <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                    <div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                    <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                </div>
            </div>
            <div class="swal2-title">
                {{ __('rides.everything-is-alright') }}
            </div>
            <div class="swal2-content">
                <div class="swal2-html-container">
                    {{ __('rides.send-reservation-to-the-driver') }}
                </div>
            </div>
            <form action="{{route('notifications.get-ride',  ['lang'=>app()->getLocale()]) }}" method="GET">
            @csrf
            @method('GET')
                <input id="places_number" type='hidden' name="places-number">
                <input type='hidden' name="user-to" id="user_to" value="{{$ride->first()->user->id}}">
                <input type='hidden' name="ride-id" value="{{$ride->first()->id}}">
                <input type='hidden' name="user-from" id="user_from" value={{auth()->user()->id ?? 'notSignedIn'}}>
                <div class="swal2-actions">
                    <button class="swal2-confirm swal2-styled" id="exit-get-ride-button" >{{ __('rides.reservation') }}</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="d-flex flex-column-fluid">
    <div class=" container">
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">

            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">
                        <div class="route-process">
                            <span class="text-dark font-weight-bold font-size-lg">
                                @php 
                                    if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                        if($ride->first()->across_cities[0]->city->name_hu == ''):
                                            if($ride->first()->across_cities[0]->city->name_en == ''):
                                                echo $ride->first()->across_cities[0]->city->name_ro;
                                            else:
                                                echo $ride->first()->across_cities[0]->city->name_en;
                                            endif;
                                        else:
                                            echo $ride->first()->across_cities[0]->city->name_hu;
                                        endif;
                                        elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                            if($ride->first()->across_cities[0]->city->name_en == ''):
                                                if($ride->first()->across_cities[0]->city->name_hu == ''):
                                                    echo $ride->first()->across_cities[0]->city->name_ro;
                                                else:
                                                    echo $ride->first()->across_cities[0]->city->name_hu;
                                                endif;
                                            else:
                                                echo $ride->first()->across_cities[0]->city->name_en;
                                            endif;
                                        elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                            if($ride->first()->across_cities[0]->city->name_ro == ''):
                                                if($ride->first()->across_cities[0]->city->name_en == ''):
                                                    echo $ride->first()->across_cities[0]->city->name_hu;
                                                else:
                                                    echo $ride->first()->across_cities[0]->city->name_en;
                                                endif;
                                            else:
                                                echo $ride->first()->across_cities[0]->city->name_ro;
                                            endif;
                                        endif; 
                                    @endphp
                            </span>
                            <i class="fas fa-long-arrow-alt-right fa-2x right-arrow"></i>

                            <span class="text-dark font-weight-bold font-size-lg">
                                @php 
                                if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                    if($ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_hu == ''):
                                        if($ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_en == ''):
                                            echo $ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_ro;
                                        else:
                                            echo $ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_en;
                                        endif;
                                    else:
                                        echo $ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_hu;
                                    endif;
                                    elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                        if($ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_en == ''):
                                            if($ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_hu == ''):
                                                echo $ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_ro;
                                            else:
                                                echo $ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_hu;
                                            endif;
                                        else:
                                            echo $ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_en;
                                        endif;
                                    elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                        if($ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_ro == ''):
                                            if($ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_en == ''):
                                                echo $ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_hu;
                                            else:
                                                echo $ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_en;
                                            endif;
                                        else:
                                            echo $ride->first()->across_cities[count($ride->first()->across_cities)-1]->city->name_ro;
                                        endif;
                                    endif; 
                                @endphp
                            </span>
                        </div>
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('navigation.chat', ['lang'=>app()->getLocale(), 'user_to'=>$ride->first()->user_id]) }}"><button type="button" class="btn btn-warning"><i class="fas fa-comments"></i>Chat</button></a>
                    @if (Auth::check())
                        <button type="button" class="btn btn-primary margin-left" id="get-ride-button"><i class="fas fa-hand-paper"></i>{{ __('rides.reservation') }}</button>
                    @else
                        <a href="{{ route('navigation.chat', ['lang'=>app()->getLocale(), 'user_to'=>$ride->first()->user_id]) }}"><button type="button" class="btn btn-primary margin-left"><i class="fas fa-hand-paper"></i>{{ __('rides.reservation') }}</button></a>
                    @endif
                </div>
            </div>
            
            <div class="card-body">
                <div class="d-flex flex-column-fluid" >
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                        <div class="card-title">
                                            {{ __('rides.details') }}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex flex-wrap align-items-center py-1">
                                            <div class="symbol symbol-80 symbol-light-danger mr-5">
                                                    <img class="image-fit" src="{{ $ride->first()->user->hasMedia('profile') ? url('/') . '/' . $ride->first()->user->getMedia('profile')->first()->getDiskPath() : asset('images/blank.jpg') }}"/>
                                            </div>
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <span class="text-dark font-weight-bold font-size-lg">
                                                    <i class="far fa-address-card greened"></i>  &nbsp; {{ $ride->first()->user->name }}
                                                </span>
                                                <span class="text-dark font-weight-bold font-size-lg ">
                                                    <i class="far fa-envelope yellowed hovered" id="user-email-icon"></i> &nbsp; <span id="user-email" class="hide" >{{ $ride->first()->user->email }}</span>
                                                </span>
                                                <span class="text-dark font-weight-bold font-size-lg ">
                                                    <i class="fas fa-star reded"></i> &nbsp; 
                                                    @if($ride->first()->user->rating_counter != 0)
                                                        {{ number_format($ride->first()->user->rating/$ride->first()->user->rating_counter, 1) }} ({{$ride->first()->user->rating_counter}})
                                                    @else
                                                        {{ 0 }} ({{0}})
                                                    @endif
                                                </span>
                                            </div>
                                            
                                            <div class="d-flex flex-column w-100 mt-12">
                                                <span class="text-dark mr-2 font-size-lg font-weight-bolder pb-4">
                                                    {{ __('rides.price') }} &nbsp; <i class="fas fa-money-bill greened"></i>&nbsp;
                                                    @if($ride->first()->currency == 'Free')
                                                     {{ __('ride-create.free') }}
                                                    @else
                                                    {{ $ride->first()->price . ' ' . $ride->first()->currency}}
                                                    @endif
                                                </span>
                                                <span class="text-dark mr-2 font-size-lg font-weight-bolder pb-4">
                                                    {{ __('rides.start') }}  <div style="display: inline;">&nbsp; <i class="far fa-calendar-alt yellowed"></i>&nbsp;<text>{{  substr($ride->first()->start_time, 0, 10) }}</text> <div style="display: inline;">&nbsp;<i class="far fa-clock blued"></i><text> {{ substr($ride->first()->start_time, 10, 6) }}</text></div></div>
                                                </span>
                                                @if($ride->first()->places > 0 && $ride->first()->start_time > date('Y-m-d H:i:s'))
                                                    <div class="text-dark mr-2 font-size-lg font-weight-bolder pb-4">
                                                        {{ __('rides.free-places') }} 
                                                    </div>
                                                    <div class="d-flex places-user-icon-group">
                                                        @for($i=0;$i<$ride->first()->places;$i++)
                                                            <i class="fa fa-user fa-3x places-user-icon-ride"  aria-hidden="true"></i>
                                                        @endfor
                                                    </div>
                                                    <br>
                                                    <div class="text-dark mr-2 font-size-lg font-weight-bolder pb-4">
                                                        {{ __('rides.comment') }}
                                                    </div>
                                                    <div class="d-flex text-dark font-weight-bold font-size-lg margined">
                                                        {{ $ride->first()->comment }}
                                                    </div>
                                                @else
                                                    <div class="text-danger mr-2 font-size-lg font-weight-bolder pb-4">
                                                        {{ __('rides.ride-out') }} 
                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                        <div class="card-title">
                                            {{ __('rides.route') }}
                                            <div class="map-route-infos">
                                                <div class="card-toolbar info-card">
                                                    <div class="btn-sm btn-info font-weight-bold info-card">
                                                        <i class="flaticon-placeholder-3"></i>
                                                        <text id="distance-shower"></text>
                                                        KM
                                                    </div>
                                                </div>
                                                <div class="card-toolbar info-card">
                                                    <div class="btn-sm btn-danger font-weight-bold info-card">
                                                        <i class="flaticon2-hourglass-1"></i>
                                                        <text id="time-shower"></text>
                                                        {{ __('ride-create.minutes') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" id="map">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                        <div class="card-title">
                                            {{ __('rides.color-coding') }}:
                                        </div>
                                        <div class="card-color-infos">
                                            <i class="fa fa-genderless text-warning color-icon"></i>
                                            {{ __('rides.village') }}
                                            <i class="fa fa-genderless text-danger color-icon"></i>
                                            {{ __('rides.town') }}
                                            <i class="fa fa-genderless text-primary color-icon"></i>
                                            {{ __('rides.city') }}
                                        </div>
                                    </div>

                                        <div class="card card-custom card-stretch gutter-b">
                                            <div class="card-header align-items-center border-0 mt-4">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="font-weight-bolder text-dark">{{ __('rides.touched-locations') }}</span>
                                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ count($ride->first()->across_cities) }} {{ __('rides.locations-near-the-route') }}</span>
                                                </h3>
                                            </div>

                                            <div class="card-body pt-4">
                                                <div class="timeline timeline-5 mt-3">
                                                    @foreach($ride->first()->across_cities as $across_city) 
                                                        <div class="timeline-item align-items-start">
                                                            @if( $across_city->sequence == 1)
                                                                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">Start</div>
                                                            @elseif($across_city->sequence == count($ride->first()->across_cities))
                                                                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">Finish</div>
                                                            @else
                                                                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg"></div>
                                                            @endif
                                                            <div class="timeline-badge">
                                                                @if( $across_city->sequence == 1)
                                                                    <i class="fa fa-genderless text-success icon-xl"></i>
                                                                @elseif( $across_city->sequence == count($ride->first()->across_cities))
                                                                    <i class="fa fa-genderless text-success icon-xl"></i>
                                                                @elseif( $across_city->city->type == "village")
                                                                    <i class="fa fa-genderless text-warning icon-xl"></i>
                                                                @elseif( $across_city->city->type == "town")
                                                                    <i class="fa fa-genderless text-danger icon-xl"></i>
                                                                @elseif( $across_city->city->type == "city")
                                                                    <i class="fa fa-genderless text-primary icon-xl"></i>
                                                                @endif
                                                            </div>
                                                            <div class="font-weight-bolder text-dark-75 pl-3 font-size-lg">
                                                                @php 
                                                                if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                                                    if($across_city->city->name_hu == ''):
                                                                        if($across_city->city->name_en == ''):
                                                                            echo $across_city->city->name_ro;
                                                                        else:
                                                                            echo $across_city->city->name_en;
                                                                        endif;
                                                                    else:
                                                                        echo $across_city->city->name_hu;
                                                                    endif;
                                                                elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                                                    if($across_city->city->name_en == ''):
                                                                        if($across_city->city->name_hu == ''):
                                                                            echo $across_city->city->name_ro;
                                                                        else:
                                                                            echo $across_city->city->name_hu;
                                                                        endif;
                                                                    else:
                                                                        echo $across_city->city->name_en;
                                                                    endif;
                                                                elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                                                    if($across_city->city->name_ro == ''):
                                                                        if($across_city->city->name_en == ''):
                                                                            echo $across_city->city->name_hu;
                                                                        else:
                                                                            echo $across_city->city->name_en;
                                                                        endif;
                                                                    else:
                                                                        echo $across_city->city->name_ro;
                                                                    endif;
                                                                endif;                                             
                                                                @endphp
                                                            </div>
                                                        </div>

                                                    @endforeach
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Hidden divs for javascript file, to help the file on language select --}}
<div class="hide" id="hidden-div-hours">{{ __('ride-create.hours') }}</div>
<div class="hide" id="hidden-div-hour">{{ __('ride-create.hour') }}</div>

<div class="hidden" id="waypoints">
    @foreach($ride->first()->waypoints as $waypoint) 
        <input id="waypoint{{$waypoint->sequence}}" value="{{$waypoint->latitude}} {{$waypoint->longitude}}">
    @endforeach
</div>

<script src="{{ asset('js/ride-information.js') }}"></script>

@if(app()->getLocale() == 'ro')
    <script src="https://maps.googleapis.com/maps/api/js?language=ro&key=AIzaSyBhsouaDYFdYICiHS4AIS50Elhkr_36IN0&callback=initMap"></script>
@elseif(app()->getLocale() == 'en')
    <script src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyBhsouaDYFdYICiHS4AIS50Elhkr_36IN0&callback=initMap"></script>
@else
    <script src="https://maps.googleapis.com/maps/api/js?language=hu&key=AIzaSyBhsouaDYFdYICiHS4AIS50Elhkr_36IN0&callback=initMap"></script>
@endif

@endsection