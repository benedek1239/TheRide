@extends('layouts.app')

@section('content')

<link href="{{ asset('css/rides.css') }}" rel="stylesheet" type="text/css"/>



<div class="container">   
    <div class="card card-custom card-sticky">
        <div class="card-header" style="">
            <div class="card-title">
                <i class="fas fa-filter fa-1.5x text-primary icon-sized2" id="filter-rides-icon"></i>
                    <div class="input-icon">
                        <input type="text" class="form-control" placeholder="{{ __('rides.search') }}" id="search-rides-input">
                        <span>
                            <i class="flaticon2-search-1 icon-md"></i>
                        </span>
                    </div>
            </div>
            <div class="right-side">
                <i class="fas fa-home fa-1.5x text-primary icon-sized" id="scroll-home-icon"></i>
                <div class="dropdown-menu p-0 m-0 filter-dropdown-menu dropdown-menu-anim-up p-0 auto-widthed" id="filter-dropdown">
                    <a  href="{{ route('navigation.rides', ['lang'=>app()->getLocale(), 'filter'=>'created_desc']) }}" class="filter-item">{{ __('rides.created-time') }} <i class="fas fa-sort-amount-down blacked"></i></a>
                    <a  href="{{ route('navigation.rides', ['lang'=>app()->getLocale(), 'filter'=>'created_asc']) }}" class="filter-item">{{ __('rides.created-time') }} <i class="fas fa-sort-amount-up blacked"></i></a>
                    <a  href="{{ route('navigation.rides', ['lang'=>app()->getLocale(), 'filter'=>'price_desc']) }}" class="filter-item">{{ __('rides.according-to-price') }} <i class="fas fa-sort-amount-down blacked"></i></a>
                    <a  href="{{ route('navigation.rides', ['lang'=>app()->getLocale(), 'filter'=>'price_asc']) }}" class="filter-item">{{ __('rides.according-to-price') }} <i class="fas fa-sort-amount-up blacked"></i></a>
                    <a  href="{{ route('navigation.rides', ['lang'=>app()->getLocale(), 'filter'=>'start_desc']) }}" class="filter-item">{{ __('rides.start-time') }} <i class="fas fa-sort-amount-down blacked"></i></a>
                    <a  href="{{ route('navigation.rides', ['lang'=>app()->getLocale(), 'filter'=>'start_asc']) }}" class="filter-item">{{ __('rides.start-time') }} <i class="fas fa-sort-amount-up blacked"></i></a>
                    <a  href="{{ route('navigation.rides', ['lang'=>app()->getLocale(), 'filter'=>'places_desc']) }}" class="filter-item">{{ __('rides.places-number') }}<i class="fas fa-sort-amount-down blacked"></i></a>
                    <a  href="{{ route('navigation.rides', ['lang'=>app()->getLocale(), 'filter'=>'places_asc']) }}" class="filter-item">{{ __('rides.places-number') }}<i class="fas fa-sort-amount-up blacked"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        @foreach($rides as $ride) 
            @if($ride->places > 0 && $ride->start_time > date('Y-m-d H:i:s'))

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
                                <div class="date-line-responsivity text-dark mr-2 font-size-lg font-weight-bolder pb-4">&nbsp; <i class="far fa-calendar-alt yellowed"></i>&nbsp;<text>{{  substr($ride->start_time, 0, 10) }}</text> <div class="date-line-responsivity">&nbsp;<i class="far fa-clock blued"></i><text> {{ substr($ride->start_time, 10, 6) }}</text></div></div>

                            </div>

                            <div class="d-flex flex-column w-100 mt-12">
                                <div class="route-process">
                                    <span class="text-dark font-weight-bold font-size-lg city-name">
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

                                    <span class="text-dark font-weight-bold font-size-lg city-name">
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
                                    @if($ride->currency == 'Free')
                                    {{ __('rides.price') }} {{ __('ride-create.free') }}
                                    @else
                                    {{ __('rides.price') }} {{ $ride->price . ' ' . $ride->currency}}
                                    @endif
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
                            <div class="created-date">
                                <span class="text-dark mr-2 pb-4">
                                    {{ __('notifications.at') }}{{ substr($ride->created_at, 0, 10) }}&nbsp;&nbsp;{{ substr($ride->created_at, 10, 6) }}
                                </span>
                            </div>
                            <a href="{{ route('ride-informations', ['lang'=>app()->getLocale(), 'id'=>$ride['id']]) }}" class="btn btn-outline-primary get-ride-button"> {{ __('rides.open') }} </a>

                        </div>
                    </div>
                </div>
            </div>
            <!--end::Ride-->
            
            @endif
        @endforeach

    </div>
</div>

<script src="{{ asset('js/rides.js') }}"></script>

@endsection