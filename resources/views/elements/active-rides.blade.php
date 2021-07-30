@extends('layouts.app')

@section('content')

@php 
    use App\Ride_user;
@endphp

<link href="{{ asset('css/active-rides.css') }}" rel="stylesheet" type="text/css"/>


<div class="d-flex flex-column-fluid">
    <div class=" container">
        <div class="row">

            @foreach($activeRides as $activeRide) 
                @if($activeRide->ride->start_time > date('Y-m-d H:i:s'))

                    {{-- TOP-UP --}}
                    <div class="swal2-container swal2-center swal2-backdrop-show hidden" id="popup-container-{{$activeRide->id}}" style="overflow-y: auto;">
                        <div class="swal2-popup swal2-modal swal2-icon-warning swal2-show" style="display: flex;">

                                <div class="swal2-header">
                                    <div class="swal2-icon swal2-question" style="display: flex;">
                                        <div class="swal2-icon-content">?</div>
                                    </div>
                                </div>
                                <div class="swal2-title">
                                    {{ __('active-rides.sure') }}
                                </div>

                                @if($activeRide->status == 2)
                                <form action="{{route('activeRides.cancel-ride', ['user'=>auth()->user()])}}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <div class="swal2-actions">
                                        <button type="submit" class="swal2-confirm swal2-styled success-bg">{{ __('active-rides.yes') }}</button>
                                        <button type="button" class="swal2-cancel swal2-styled" onClick="hideTopup({{$activeRide->id}}); return false;" >{{ __('rides.cancel') }}</button>
                                    </div>
                                    <input type='hidden' name="ride-user-id" value="{{$activeRide->id}}">
                                    <input type='hidden' name="places-number" value="{{$activeRide->places}}"> 
                                    <input type='hidden' name="ride-id" value="{{$activeRide->ride->id}}">
                                    <input type='hidden' name="user-to" value="{{$activeRide->ride->user_id}}"> 
                                </form>
                                @else
                                    <form action="{{route('activeRides.delete-ride', ['user'=>auth()->user()])}}" method="GET">
                                        @csrf
                                        @method('GET')
                                        <div class="swal2-actions">
                                            <button type="submit" class="swal2-confirm swal2-styled success-bg">{{ __('active-rides.yes') }}</button>
                                            <button type="button" class="swal2-cancel swal2-styled" onClick="hideTopup({{$activeRide->id}}); return false;" >{{ __('rides.cancel') }}</button>
                                        </div>
                                        <input type='hidden' name="ride-id" value="{{$activeRide->ride->id}}">
                                    </form>
                                @endif
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-custom gutter-b card-stretch">
                            <a href="{{ route('ride-informations', ['lang'=>app()->getLocale(), 'id'=>$activeRide->ride->id]) }}">
                                <div class="card-body text-center pt-4">
                                    <div class="hovered-card">
                                        <div class="route-process">
                                            <span class="text-dark font-weight-bold font-size-lg">
                                                @php 
                                                if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                                    if($activeRide->ride->across_cities[0]->city->name_hu == ''):
                                                        if($activeRide->ride->across_cities[0]->city->name_en == ''):
                                                            echo $activeRide->ride->across_cities[0]->city->name_ro;
                                                        else:
                                                            echo $activeRide->ride->across_cities[0]->city->name_en;
                                                        endif;
                                                    else:
                                                        echo $activeRide->ride->across_cities[0]->city->name_hu;
                                                    endif;
                                                    elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                                        if($activeRide->ride->across_cities[0]->city->name_en == ''):
                                                            if($activeRide->ride->across_cities[0]->city->name_hu == ''):
                                                                echo $activeRide->ride->across_cities[0]->city->name_ro;
                                                            else:
                                                                echo $activeRide->ride->across_cities[0]->city->name_hu;
                                                            endif;
                                                        else:
                                                            echo $activeRide->ride->across_cities[0]->city->name_en;
                                                        endif;
                                                    elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                                        if($activeRide->ride->across_cities[0]->city->name_ro == ''):
                                                            if($activeRide->ride->across_cities[0]->city->name_en == ''):
                                                                echo $activeRide->ride->across_cities[0]->city->name_hu;
                                                            else:
                                                                echo $activeRide->ride->across_cities[0]->city->name_en;
                                                            endif;
                                                        else:
                                                            echo $activeRide->ride->across_cities[0]->city->name_ro;
                                                        endif;
                                                    endif; 
                                                @endphp
                                            </span>
                                            <i class="fas fa-arrow-down fa-2x down-arrow"></i>
                                            <span class="text-dark font-weight-bold font-size-lg">
                                                @php 
                                                if(Route::getCurrentRoute()->parameters['lang']=='hu'):
                                                    if($activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_hu == ''):
                                                        if($activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_en == ''):
                                                            echo $activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_ro;
                                                        else:
                                                            echo $activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_en;
                                                        endif;
                                                    else:
                                                        echo $activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_hu;
                                                    endif;
                                                    elseif(Route::getCurrentRoute()->parameters['lang']=='en'):
                                                        if($activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_en == ''):
                                                            if($activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_hu == ''):
                                                                echo $activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_ro;
                                                            else:
                                                                echo $activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_hu;
                                                            endif;
                                                        else:
                                                            echo $activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_en;
                                                        endif;
                                                    elseif(Route::getCurrentRoute()->parameters['lang']=='ro'):
                                                        if($activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_ro == ''):
                                                            if($activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_en == ''):
                                                                echo $activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_hu;
                                                            else:
                                                                echo $activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_en;
                                                            endif;
                                                        else:
                                                            echo $activeRide->ride->across_cities[count($activeRide->ride->across_cities)-1]->city->name_ro;
                                                        endif;
                                                    endif; 
                                                @endphp
                                            </span>
                                        </div>

                                        <div class="mt-7 pb-2">
                                            <div class="symbol symbol-lg-75 symbol-circle symbol-light-success icon-greened-back">
                                                <img src="{{ $activeRide->status==1 ?  asset('images/driver.png')  : asset('images/passanger.png') }}" alt="image"/>
                                            </div>
                                        </div>

                                        <div class="my-2">
                                            <span class="text-dark font-weight-bold font-size-h4">@if($activeRide->status==1){{ __('active-rides.driver') }} @else {{ __('active-rides.passanger') }} @endif</span>
                                        </div>

                                        <div class="mt-9 mb-6 font-weight-bold">
                                            <div class="date-line-responsivity">&nbsp; <i class="far fa-calendar-alt yellowed"></i>&nbsp;<text>{{ substr($activeRide->ride->start_time, 0, 10) }}</text> <div class="date-line-responsivity">&nbsp;<i class="far fa-clock blued"></i><text> {{ substr($activeRide->ride->start_time, 10, 6) }}</text></div></div>
                                        </div>
                                    </div>
                                </a>
                                @if($activeRide->status==2)
                                    <div class="mt-9 mb-6 font-weight-bold blacked-font">
                                        {{ __('active-rides.reserved-places') }}
                                    </div>  
                                    <div class="d-flex">
                                        @for($i=0;$i<$activeRide->places;$i++)
                                            <i class="fa fa-user fa-3x places-user-icon-ride"  aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                    <button onClick="showTopup({{$activeRide->id}})" class="btn btn-light-danger font-weight-bold mr-2 delete-button">{{ __('active-rides.resignation') }}</button>
                                @else
                                    @php $passangersOnRide = Ride_user::Where('ride_id', $activeRide->ride->id)->get(); @endphp
                                    @if(count($passangersOnRide) > 1)
                                        <div class="mt-9 mb-2 font-weight-bold blacked-font font-size-h4">
                                            {{ __('active-rides.passangers') }}
                                        </div> 
                                        @foreach($passangersOnRide as $passangerOnRide) 
                                            @if($passangerOnRide->status == 2)
                                                <div class="separator-row"></div>
                                                <div class="symbol symbol-lg-75 symbol-circle symbol-light-success passanger-profile">
                                                    <img src="{{ $passangerOnRide->user->hasMedia('profile') ? url('/') . '/' . $passangerOnRide->user->getMedia('profile')->first()->getDiskPath() : asset('images/blank.jpg') }}" alt="image"/>
                                                </div>
                                                <div class="mt-2 mb-2 font-weight-bold blacked-font">
                                                    {{ $passangerOnRide->user->name }}
                                                </div>
                                                <a href="{{ route('navigation.chat', ['lang'=>app()->getLocale(), 'user_to'=>$passangerOnRide->user->id]) }}"><span class="label label-inline label-lg label-light-warning btn-sm font-weight-bold">Chat</span></a>
                                                <div class="mt-2 mb-8">
                                                    @for($i=0;$i<$passangerOnRide->places;$i++)
                                                        <i class="fa fa-user fa-2x places-user-icon-ride"  aria-hidden="true"></i>
                                                    @endfor
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                    <button onClick="showTopup({{$activeRide->id}})" class="btn btn-light-danger font-weight-bold mr-2 delete-button">{{ __('notifications.delete') }}</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</div>

<script>
    function showTopup(activeRide_id){
        document.getElementById(`popup-container-${activeRide_id}`).classList.remove('hidden');
    }

    function hideTopup(activeRide_id){
        document.getElementById(`popup-container-${activeRide_id}`).classList.add('hidden');
    }


    document.getElementById('active-rides-button').classList.add('menu-item-active');
</script>

@endsection