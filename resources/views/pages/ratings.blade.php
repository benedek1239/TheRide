@extends('layouts.app')

@section('content')

<style>

.font-size-bigger{
    font-size: 1.6rem;
}
.icon-greened-back{
    background: rgba(160, 254, 211);
}
.blued{
    color: blue;
}
.yellowed{
    color: orange;
}
.star-icon{
    color: red;
}
.margined-bottom{
    margin-bottom: 25px !important;
}
.date-line-responsivity{
    position: absolute;
    right: 5px;
    bottom: 5px;
    display: inline;
    margin-top: 10px;
    color: black;
}
.hovered-card:hover{
    filter: drop-shadow(2px 4px 6px black);
}

</style>

<?php  $user = auth()->user() ?>


<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="notification-title">
            <span class="text-dark font-weight-bold font-size-bigger ">
                {{ __('notifications.ratings') }}
            </span>
        </div>

        <div class="row">

            @foreach($user->ratings->reverse() as $rating) 

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 hovered-card">
                    <div class="card card-custom gutter-b card-stretch">
                        <a href="{{ route('ride-informations', ['lang'=>app()->getLocale(), 'id'=>$rating->ride->id]) }}" >
                            <div class="card-body text-center pt-4">
                                <div class="mt-7 pb-2">
                                    <div class="symbol symbol-lg-75 symbol-circle symbol-light-success icon-greened-back">
                                        <img src="{{ $rating->user->hasMedia('profile') ? url('/') . '/' . $rating->user->getMedia('profile')->first()->getDiskPath() : asset('images/blank.jpg') }}" alt="image"/>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <span class="text-dark font-weight-bold font-size-h4">{{$rating->user->name}}</span>
                                </div>
                                <div class="my-2 margined-bottom">
                                    @for($i=0;$i<$rating->rating;$i++)
                                        <i class="flaticon-star star-icon"></i>
                                    @endfor
                                </div>
                                <div>
                                    <div class="date-line-responsivity">&nbsp; <i class="far fa-calendar-alt yellowed"></i>&nbsp;<text>{{ substr($rating->created_at, 0, 10) }}</text>&nbsp;<i class="far fa-clock blued"></i><text> {{ substr($rating->created_at, 10, 6) }}</text></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>



@endsection