@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
        <link href="{{ asset('css/ride-create.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/pages/wizard/wizard-1.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
    </head>


<body>


    <div class="swal2-container swal2-center swal2-backdrop-show hide" id="popup-container" style="overflow-y: auto;">
        <div class="swal2-popup swal2-modal swal2-icon-warning swal2-show" style="display: flex;">
            <div class="swal2-header">
                <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                    <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                    <div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                    <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                </div>
            </div>
            <div class="swal2-title">
                {{ __('ride-create.ride-created') }}
            </div>
        </div>
    </div>
<!--begin::Container-->
<div class=" container">
    
    <div class="card card-custom">
        <div class="card-body p-0">

            <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="step-first" data-wizard-clickable="false">
            <div class="wizard-nav border-bottom">
                <div class="wizard-steps p-8 p-lg-10">
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-globe"></i>
                            <h3 class="wizard-title">1. {{ __('ride-create.select-locations') }}</h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                            </g>
                            </svg><!--end::Svg Icon--></span>
                    </div>

                    <div class="wizard-step" data-wizard-type="step" id="wizzard-navbar-2">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-bus-stop"></i>
                            <h3 class="wizard-title">2. {{ __('ride-create.choose-route') }}</h3>
                        </div>
                        <span class="svg-icon svg-icon-xl wizard-arrow"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                            </g>
                </svg><!--end::Svg Icon--></span>                    
                    </div>

                    <div class="wizard-step" data-wizard-type="step" id="wizzard-navbar-3">
                        <div class="wizard-label">
                            <i class="wizard-icon flaticon-list"></i>
                            <h3 class="wizard-title">3. {{ __('ride-create.enter-details') }}</h3>
                        </div>
                    <span class="svg-icon svg-icon-xl wizard-arrow last"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
                        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
                        </g>
                        </svg><!--end::Svg Icon--></span>                    
                    </div>
            </div>
        </div>
    </div>



        <div class="form-1" id="form-1">

            <strong id="start-text">{{ __('ride-create.start') }}</strong>
            <div class="col-sm-12">
                <input type="text" class="hide" id="start" value="nothing">
                <input type="text" class="form-control" placeholder="{{ __('ride-create.select') }}" value="" id="start-input" autocomplete="off">
                <div class="city-shower form-control" id="start-searcher">
                </div>
            </div>
            <i class="fas fa-times-circle fa-2x delete-icon" id="start-cancel-icon"></i>

            <br />
            <strong id="finish-text">{{ __('ride-create.finish') }}</strong>
            <div class="col-sm-12">
                <input type="text" class="hide" id="end" value="nothing">
                <input type="text" class="form-control" placeholder="{{ __('ride-create.select') }}" value="" id="end-input" autocomplete="off">
                <div class="city-shower form-control" id="end-searcher">
                </div>
            </div>
            <i class="fas fa-times-circle fa-2x delete-icon" id="end-cancel-icon"></i>

            <button class="btn btn-success sign-up-button mr-2" id="search-button">{{ __('ride-create.next') }}</button>
        </div>

        <div class="d-flex flex-column-fluid" >
            <div class=" container " id="form-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        {{ __('ride-create.planned-route') }}
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
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-6">
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        {{ __('ride-create.not-your-route') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-label card-subtitle">
                                    {{ __('ride-create.choose-village') }}
                                </h3>

                                <div class="col-sm-12 col-lg-5">
                                    <input type="text" class="hide" id="middle0" value="nothing">
                                    <input type="text" class="form-control fixed-width" placeholder="{{ __('ride-create.select') }}" value="" id="middle0-input" autocomplete="off">
                                    <div class="city-shower form-control" id="middle0-searcher">

                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-5">
                                    <input type="text" class="hide" id="middle1" value="nothing">
                                    <input type="text" class="form-control hide margined-top fixed-width" placeholder="{{ __('ride-create.select') }}" value="" id="middle1-input" autocomplete="off">
                                    <div class="city-shower form-control" id="middle1-searcher">

                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-5">
                                    <input type="text" class="hide" id="middle2" value="nothing">
                                    <input type="text" class="form-control hide margined-top fixed-width" placeholder="{{ __('ride-create.select') }}" value="" id="middle2-input" autocomplete="off">
                                    <div class="city-shower form-control" id="middle2-searcher">

                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-5">
                                    <input type="text" class="hide" id="middle3" value="nothing">
                                    <input type="text" class="form-control hide margined-top fixed-width" placeholder="{{ __('ride-create.select') }}" value="" id="middle3-input" autocomplete="off">
                                    <div class="city-shower form-control" id="middle3-searcher">

                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-5">
                                    <input type="text" class="hide" id="middle4" value="nothing">
                                    <input type="text" class="form-control hide margined-top fixed-width" placeholder="{{ __('ride-create.select') }}" value="" id="middle4-input" autocomplete="off">
                                    <div class="city-shower form-control" id="middle4-searcher">

                                    </div>
                                </div>
                              
                                <i class="fas fa-times-circle fa-2x middle-delete-input-icon" id="middle-cancel-input-icon"></i>
                                <i class="fas fa-plus-circle fa-2x plus-input" id="new-input-button"></i>
                                <button class="btn btn-success sign-up-button mr-2" id="middle-button">{{ __('ride-create.new-route') }}</button>
                                <button class="btn btn-primary mr-2" id="form-2-button">{{ __('ride-create.next') }}</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id="form-3">
                <form action="{{ route('ride.store') }}" method="POST" id="new-ride-form">
                {{ csrf_field() }}
                    <label class="form-3-label">{{ __('ride-create.ride-day') }}</label> 
                    <div>
                        <input type="date" class="form-control search-date-input" id="ride-date" autocomplete="off">
                        <i class="fas fa-times-circle fa-2x validation-icon" id="validation-icon-1"></i>
                    </div>


                    <label class="form-3-label">{{ __('ride-create.ride-time') }}</label>
                    <div class="select-time-div">
                        <select class="form-control date-value-input" data-size="7" data-live-search="true" id="ride-date-hours">
                            <option value="nothing" selected disabled>{{ __('ride-create.hour') }}</option>
                        </select> 
                        <select class="form-control date-value-input" data-size="7" data-live-search="true" id="ride-date-minutes">
                            <option value="nothing" selected disabled>{{ __('ride-create.minute') }}</option>
                        </select>
                        <i class="fas fa-times-circle fa-2x validation-icon" id="validation-icon-2"></i>
                    </div>
                    <input type="hidden" id="formated_date" name="formated_date" >

                    <label class="form-3-label">{{ __('ride-create.free-place') }}</label></br>
                    <i class="fa fa-user fa-4x places-user-icon mained-clicked" id="places-icon-1" aria-hidden="true"></i>
                    <i class="fa fa-user fa-4x places-user-icon" id="places-icon-2" aria-hidden="true"></i>
                    <i class="fa fa-user fa-4x places-user-icon" id="places-icon-3" aria-hidden="true"></i>
                    <i class="fa fa-user fa-4x places-user-icon" id="places-icon-4" aria-hidden="true"></i>
                    </br>
                    <i class="fa fa-user fa-4x places-user-icon" id="places-icon-5" aria-hidden="true"></i>
                    <i class="fa fa-user fa-4x places-user-icon" id="places-icon-6" aria-hidden="true"></i>
                    <i class="fa fa-user fa-4x places-user-icon" id="places-icon-7" aria-hidden="true"></i>
                    <i class="fa fa-user fa-4x places-user-icon" id="places-icon-8" aria-hidden="true"></i>
                    </br>
                    
                    <input type="hidden" id="places_number" name="places_number" value="1" >

                    <label class="form-3-label">{{ __('ride-create.price') }}</label>
                    <div class="select-time-div">
                        <input class="form-control date-value-input" id="price_cost" name="price_cost" autocomplete="off">
                        <select class="form-control date-value-input" id="currency_type" name="currency_type">
                            <option value="" selected disabled>{{ __('ride-create.currency') }}</option>
                            <option value="Ron">Ron</option>
                            <option value="Forint">Forint</option>
                            <option value="Euro">Euro</option>
                            <option value="Free">{{ __('ride-create.free') }}</option>
                        </select>
                        <i class="fas fa-times-circle fa-2x validation-icon" id="validation-icon-3"></i>
                        </br>
                    </div>

                    <label class="form-3-label">{{ __('ride-create.comment') }}</label>
                    <textarea class="form-control" name="ride_comment" id="ride_comment"></textarea>

                    <div id="between-cities">

                    </div>
                    
                    <div id="all-waypoints">

                    </div>

                    <button  type="button" class="btn btn-secondary mr-2 " id="create-ride-button" disabled>{{ __('ride-create.create-ride') }}</button>
                </form>

            </div>
        </div>
    </div>

</div>

        </div>
{{-- Hidden divs for javascript file, to help the file on language select --}}
<div class="hide" id="hidden-div-hours">{{ __('ride-create.hours') }}</div>
<div class="hide" id="hidden-div-hour">{{ __('ride-create.hour') }}</div>


<script src="{{ asset('js/ride-create.js') }}"></script>

@if(app()->getLocale() == 'ro')
    <script src="https://maps.googleapis.com/maps/api/js?language=ro&key=AIzaSyBhsouaDYFdYICiHS4AIS50Elhkr_36IN0&callback=initMap"></script>
@elseif(app()->getLocale() == 'en')
    <script src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyBhsouaDYFdYICiHS4AIS50Elhkr_36IN0&callback=initMap"></script>
@else
    <script src="https://maps.googleapis.com/maps/api/js?language=hu&key=AIzaSyBhsouaDYFdYICiHS4AIS50Elhkr_36IN0&callback=initMap"></script>
@endif

</body>
</html>

@endsection
