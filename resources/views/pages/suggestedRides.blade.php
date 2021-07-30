@extends('layouts.app')

@section('content')


<link href="{{ asset('css/passanger.css') }}" rel="stylesheet" type="text/css"/>

<input type="hidden" id="required-ride-id" value="{{$idRequired}}">

    @switch($rides)
        @case(!null)
        <div class="container">
            <div class="card">
                <div class="card-header"><strong>{{ __('passanger.suggested') }}</strong></div>
                <div class="container">   
                    <div class="row">
                        @foreach($rides as $ride) 
                            <!--begin::Ride-->
                            <div class="col-xl-4">
                                <div class="card card-custom gutter-b card-stretch">
                                    <div class="card-body">
                                        <div class="d-flex flex-wrap align-items-center py-1">
                                            <div class="symbol symbol-80 symbol-light-danger mr-5">
                                                <img class="image-fit" src="{{ $ride->user->hasMedia('profile') ? url('/') . '/' . $ride->user->getMedia('profile')->first()->getDiskPath() : asset('images/blank.jpg') }}"/>
                                            </div>
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <span class="text-dark font-weight-bolder font-size-h5">
                                                    {{ $ride->user->name }}
                                                </span>
                                                <div>
                                                    <i class="far fa-calendar-alt yellowed"></i>
                                                    <span class="text-dark font-weight-bold font-size-lg start-time-date">
                                                        {{ $ride->start_time }}
                                                    </span>
                                                    &nbsp;
                                                    <i class="far fa-clock blued"></i>
                                                    <span class="text-dark font-weight-bold font-size-lg start-time-hours">
                                                        {{ $ride->start_time }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-column w-100 mt-12">
                                                <div class="route-process">
                                                    <span class="text-dark font-weight-bold font-size-lg">
                                                        @php 
                                                        if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                                            if($ride->across_cities[0]->city->name_hu == ''):
                                                                if($ride->across_cities[0]->city->name_en == ''):
                                                                    echo $ride->across_cities[0]->city->name_ro;
                                                                else:
                                                                    echo $ride->across_cities[0]->city->name_en;
                                                                endif;
                                                            else:
                                                                echo $ride->across_cities[0]->city->name_hu;
                                                            endif;
                                                            elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                                                if($ride->across_cities[0]->city->name_en == ''):
                                                                    if($ride->across_cities[0]->city->name_hu == ''):
                                                                        echo $ride->across_cities[0]->city->name_ro;
                                                                    else:
                                                                        echo $ride->across_cities[0]->city->name_hu;
                                                                    endif;
                                                                else:
                                                                    echo $ride->across_cities[0]->city->name_en;
                                                                endif;
                                                            elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                                                if($ride->across_cities[0]->city->name_ro == ''):
                                                                    if($ride->across_cities[0]->city->name_en == ''):
                                                                        echo $ride->across_cities[0]->city->name_hu;
                                                                    else:
                                                                        echo $ride->across_cities[0]->city->name_en;
                                                                    endif;
                                                                else:
                                                                    echo $ride->across_cities[0]->city->name_ro;
                                                                endif;
                                                            endif; 
                                                        @endphp
                                                    </span>
                                                    <i class="fas fa-long-arrow-alt-right fa-2x right-arrow"></i>

                                                    <span class="text-dark font-weight-bold font-size-lg">
                                                        @php 
                                                        if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                                            if($ride->across_cities[count($ride->across_cities)-1]->city->name_hu == ''):
                                                                if($ride->across_cities[count($ride->across_cities)-1]->city->name_en == ''):
                                                                    echo $ride->across_cities[count($ride->across_cities)-1]->city->name_ro;
                                                                else:
                                                                    echo $ride->across_cities[count($ride->across_cities)-1]->city->name_en;
                                                                endif;
                                                            else:
                                                                echo $ride->across_cities[count($ride->across_cities)-1]->city->name_hu;
                                                            endif;
                                                            elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                                                if($ride->across_cities[count($ride->across_cities)-1]->city->name_en == ''):
                                                                    if($ride->across_cities[count($ride->across_cities)-1]->city->name_hu == ''):
                                                                        echo $ride->across_cities[count($ride->across_cities)-1]->city->name_ro;
                                                                    else:
                                                                        echo $ride->across_cities[count($ride->across_cities)-1]->city->name_hu;
                                                                    endif;
                                                                else:
                                                                    echo $ride->across_cities[count($ride->across_cities)-1]->city->name_en;
                                                                endif;
                                                            elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                                                if($ride->across_cities[count($ride->across_cities)-1]->city->name_ro == ''):
                                                                    if($ride->across_cities[count($ride->across_cities)-1]->city->name_en == ''):
                                                                        echo $ride->across_cities[count($ride->across_cities)-1]->city->name_hu;
                                                                    else:
                                                                        echo $ride->across_cities[count($ride->across_cities)-1]->city->name_en;
                                                                    endif;
                                                                else:
                                                                    echo $ride->across_cities[count($ride->across_cities)-1]->city->name_ro;
                                                                endif;
                                                            endif; 
                                                        @endphp
                                                    </span>
                                                </div>

                                            </div>

                                            <div class="d-flex flex-column w-100 mt-12">
                                                <span class="text-dark mr-2 font-size-lg font-weight-bolder pb-4">
                                                    {{ __('rides.price') }} {{ $ride->price . ' ' . $ride->currency}}
                                                </span>
                                            </div>
                        
                                            <div class="d-flex flex-column mt-10 margin-topped">
                                                <div class="text-dark mr-2 font-size-lg font-weight-bolder pb-4">
                                                    {{ __('rides.free-places') }} 
                                                </div>
                                                <div class="d-flex places-user-icon-group">
                                                    @for($i=0; $i<$ride->places; $i++)
                                                        <i class="fa fa-user fa-3x places-user-icon-ride"  aria-hidden="true"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <a href="{{ route('ride-informations', ['lang'=>app()->getLocale(), 'id'=>$ride['id']]) }}" class="btn btn-outline-primary get-ride-button"> {{ __('rides.open') }} </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Ride-->
                        
                    @endforeach
                    @php
                        break;
                    @endphp
                        <!--end::Ride-->  
                    @case(null)
                            {{-- <span>Nem talalt utvonal</span> --}}
                                <div class="h1">
                                    <h1 class="pb-1"> {{ __('passanger.NotFindRoute') }} </h1>
                                    <small class="">{{ __('passanger.notification') }}</small>
                                    <br>

                                </div>

                                <div class="h1 pt-27">
                                    <a class="btn btn-outline-danger" href="{{ route('navigation.home',['lang'=>app()->getLocale()]) }}">{{ __('passanger.homeButton') }}</a>
                                    <a class="btn btn-outline-danger" id="ride-watcher-button" onClick="RideWatcher(this)">{{ __('passanger.ride-watcher') }}</a>

                                </div>      
                @endswitch
        
            </div>
        </div>
        
    </div>
    </div>

<script src="{{ asset('js/passangerSugested.js') }}"></script>

@endsection