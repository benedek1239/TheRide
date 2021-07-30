@extends('layouts.app')

@section('content')

@php 
    use App\Ride_user;
    use App\Rating;
@endphp

<meta name="csrf-token" content="{{ csrf_token() }}">


<link href="{{ asset('css/history.css') }}" rel="stylesheet" type="text/css"/>


<div class="d-flex flex-column-fluid" >
    <div class="container">
            
        @foreach($activeRides as $activeRide) 
            @if($activeRide->ride->start_time < date('Y-m-d H:i:s'))

                <div class="col-lg-8 centered">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <a href="{{ route('ride-informations', ['lang'=>app()->getLocale(), 'id'=>$activeRide->ride->id]) }}">
                                <div class="card-title">
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
                                    <i class="fas fa-long-arrow-alt-right fa-2x right-arrow"></i>
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
                            </a>
                            <div class="ride-date">
                                <div class="date-line-responsivity">&nbsp; <i class="far fa-calendar-alt yellowed"></i>&nbsp;<text>{{ substr($activeRide->ride->start_time, 0, 10) }}</text> <div class="date-line-responsivity">&nbsp;<i class="far fa-clock blued"></i><text> {{ substr($activeRide->ride->start_time, 10, 6) }}</text></div></div>
                            </div>
                        </div>
                        <div class="card-body pt-3 pb-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-borderless table-vertical-center">
                                    <thead>
                                        <tr>
                                            <th class="p-0" style="width: 50px"></th>
                                            <th class="p-0" style="min-width: 80px"></th>
                                            <th class="p-0" style="min-width: 120px"></th>
                                            <th class="p-0" style="min-width: 80px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php $passangersOnRide = Ride_user::Where('ride_id', $activeRide->ride->id)->get(); @endphp
                                        @foreach($passangersOnRide as $passangerOnRide) 

                                            <tr>
                                                <td class="pl-0 py-4">
                                                    <div class="symbol symbol-50 symbol-light mr-1">
                                                        <span class="symbol-label">
                                                            <img src="{{ $passangerOnRide->user->hasMedia('profile') ? url('/') . '/' . $passangerOnRide->user->getMedia('profile')->first()->getDiskPath() : asset('images/blank.jpg') }}" class="h-90 align-self-center"/>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="pl-0">
                                                    <div class="text-dark-75 font-weight-bolder mb-1 font-size-lg">{{$passangerOnRide->user->name}}</div>
                                                    <div>
                                                        @if($passangerOnRide->status == 1)
                                                            <span class="label label-lg label-light-primary label-inline">{{ __('active-rides.driver') }}</span>
                                                        @else
                                                            <span class="label label-lg label-light-warning label-inline">{{ __('active-rides.passanger') }}</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                @if($passangerOnRide->user_id != auth()->user()->id)
                                                <td class="text-left" id="star-holder-div-{{$passangerOnRide->ride->id}}-{{$passangerOnRide->user_id}}">
                                                    @php 
                                                        $rating = Rating::where('ride_id' , $passangerOnRide->ride->id);
                                                        $rating = $rating->where('user_to' , $passangerOnRide->user_id)->get();
                                                    @endphp
                                                    @if(count($rating) > 0)
                                                        @for($i=0; $i<$rating[0]->rating; $i++)
                                                            <i class="flaticon-star after-star"></i>
                                                        @endfor
                                                    @else
                                                    <i class="flaticon-star before-star current-star" onclick="gotRating(this, {{$passangerOnRide->ride->id}}, {{$passangerOnRide->user_id}});" id="star-1-{{$passangerOnRide->ride->id}}-{{$passangerOnRide->user_id}}"></i>
                                                        <i class="flaticon-star before-star" onclick="gotRating(this, {{$passangerOnRide->ride->id}}, {{$passangerOnRide->user_id}});" id="star-2-{{$passangerOnRide->ride->id}}-{{$passangerOnRide->user_id}}"></i>
                                                        <i class="flaticon-star before-star" onclick="gotRating(this, {{$passangerOnRide->ride->id}}, {{$passangerOnRide->user_id}});" id="star-3-{{$passangerOnRide->ride->id}}-{{$passangerOnRide->user_id}}"></i>
                                                        <i class="flaticon-star before-star" onclick="gotRating(this, {{$passangerOnRide->ride->id}}, {{$passangerOnRide->user_id}});" id="star-4-{{$passangerOnRide->ride->id}}-{{$passangerOnRide->user_id}}"></i>
                                                        <i class="flaticon-star before-star" onclick="gotRating(this, {{$passangerOnRide->ride->id}}, {{$passangerOnRide->user_id}});" id="star-5-{{$passangerOnRide->ride->id}}-{{$passangerOnRide->user_id}}"></i>
                                                    @endif
                                                </td>
                                                    
                                                <input type="hidden" value="1" id="rating-number-{{$passangerOnRide->ride->id}}-{{$passangerOnRide->user_id}}">
                                                    <td class="text-right">
                                                        @if(count($rating) > 0)
                                                            <button class="btn font-weight-bolder btn-text-danger after-star mr-2" disabled>{{ __('active-rides.rated') }}</button>
                                                        @else
                                                            <button class="btn btn-light-danger btn-sm font-weight-bold mr-2" id="send-button-{{$passangerOnRide->ride->id}}-{{$passangerOnRide->user_id}}" onclick="sendRating(this, {{$passangerOnRide->ride->id}}, {{$passangerOnRide->user_id}});">{{ __('active-rides.rate') }}</button>
                                                        @endif
                                                    </td>
                                                @else
                                                    <td class="text-right">
                                                    
                                                    </td>
                                                    <td class="text-right">
                                                        <i class="flaticon2-calendar-3 your-profile-icon"></i>
                                                    </td>
                                                @endif
                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        @endforeach

    </div>
</div>
<input type="hidden" value="{{auth()->user()->id}}" id="signed-user-id">


<script>

function sendRating(sendButton, rideId, userId){

    clickedRatingNumber = document.getElementById(`rating-number-${rideId}-${userId}`).value;
    myId = document.getElementById(`signed-user-id`).value;
    
    sendButton.classList.remove('btn-light-danger');
    sendButton.classList.remove('btn-sm');
    sendButton.classList.add('font-weight-bolder');
    sendButton.classList.add('btn-text-danger');
    sendButton.classList.add('after-star');
    sendButton.innerHTML = `{{ __('active-rides.rated') }}`;
    sendButton.disabled = true;

    starDiv = document.getElementById(`star-holder-div-${rideId}-${userId}`);
    starDiv.innerHTML = '';

    for(i=0; i<clickedRatingNumber; ++i){
        starDiv.innerHTML += '<i class="flaticon-star barly-margined after-star"></i>';
    }
    

    $.ajax({
        url: "/giveRating",
        type: 'POST',    
        dataType: 'json',
        data: { user_from: myId, user_to: userId, ride_id: rideId, rating: clickedRatingNumber, _token: '{{csrf_token()}}' },
        success: function (data) {
			console.log('Added new user rating!')
        }
    });

}
function gotRating(star, rideId, userId){
    clickedRatingNumber = star.id.substring(5, 6);

    document.getElementById(`rating-number-${rideId}-${userId}`).value = clickedRatingNumber;
    for(i=1; i<=5; ++i){
        if(i<=clickedRatingNumber){
            document.getElementById(`star-${i}-${rideId}-${userId}`).classList.add('current-star');
        }
        else{
            document.getElementById(`star-${i}-${rideId}-${userId}`).classList.remove('current-star');
        }
    }

}


    document.getElementById('history-button').classList.add('menu-item-active');
</script>

@endsection