@extends('layouts.app')

@section('content')

<link href="{{ asset('css/user-settings.css') }}" rel="stylesheet" type="text/css"/>

<div class="container" >
    <form id="userForm" action="{{route('users.update', ['user'=>auth()->user(), 'lang'=>app()->getLocale()])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            <!--begin::Nav Panel Widget 1-->
            <div class="col-lg-6">
                <div class="card card-custom card-stretch gutter-b">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-column pt-4 h-100">
                            <div class="pb-5">
                                <div class="d-flex flex-column flex-center">
                                    <div class="symbol symbol-120 symbol-success overflow-hidden">
                                        <span class="symbol-label">
                                            <img src="{{ $imgSrc }}" class="align-self-end" id="profile-picture"/>
                                        </span>
                                    </div>
                                    <label class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">{{ __('user-settings.profile-picture') }}</label>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="pt-1">
                                    <div class="avatar-container">
                                        @for($i=0; $i<50; $i++)
                                            <div class="choosable-profile" id="{{ 'avatar-' . $i }}" onclick="choosed(this)">
                                                <img src="{{ asset('images/avatars/'. $i .'.svg') }}" id="{{$i}}" class="h-75 align-self-end margined" />
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="" data-placement="right" data-original-title="Chat Example">
                                <label class="btn btn-light-warning font-weight-bold mr-2" id="attach-btn">
                                    <span><i class="flaticon-attachment"></i> {{ __('user-settings.attach') }} </span>
                                    <input type="file" name="media" id="image-input" />
                                </label>  
                                <label class="btn btn-light-danger font-weight-bold mr-2" id="remove-image">
                                    <span><i class="flaticon2-rubbish-bin-delete-button"></i> {{ __('user-settings.remove') }} </span>
                                </label>                             
                            </div>
                            <button class="btn btn-light-success font-weight-bold mr-2 save-button" type="submit"><span><i class="far fa-save"></i>{{ __('user-settings.save') }}</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

            <div class="col-lg-6">
                <div class="card card-custom card-stretch gutter-b">
                    <div class="card-header">
                        <i class="flaticon2-calendar-3 text-success profile-icon"></i><h3 class="card-label profile-name">{{auth()->user()->name}}<h3>
                    </div>
                    <div class="card-body">
                    <span class="text-dark font-weight-bold font-size-lg ">
                        <i class="far fa-envelope yellowed margin-bottom"></i> &nbsp; {{ auth()->user()->email }}
                    </span><br>
                    <span class="text-dark font-weight-bold font-size-lg ">
                        <i class="fas fa-star reded margin-bottom"></i> &nbsp; 
                        @if(auth()->user()->rating_counter != 0)
                            {{ number_format(auth()->user()->rating/auth()->user()->rating_counter, 1) }} ({{auth()->user()->rating_counter}})
                        @else
                            {{ 0 }} ({{0}})
                        @endif
                    </span>
                    <form action="{{route('users.update-name', ['user'=>auth()->user(), 'lang'=>app()->getLocale()])}}" method="GET">
                        @csrf
                        @method('GET')
                        <div class="form-group-2">
                            <label for="name" class="subtitled">{{ __('user-settings.change-name') }}</label>
                            <button class="btn btn-light-success font-weight-bold mr-2 save2-button" name="form-1" type="submit"><span><i class="far fa-save"></i>{{ __('user-settings.save') }}</span></button>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('user-settings.new-name') }}" autocomplete="off" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </form>
                        <br><br><br><br>

                        <form action="{{route('users.update-password', ['user'=>auth()->user(), 'lang'=>app()->getLocale()])}}" method="GET">
                            @csrf
                            @method('GET')  
                            <div class="form-group-2">
                                <label for="password_old" class="subtitled">{{ __('user-settings.change-password') }}</label><br>
                                <button class="btn btn-light-success font-weight-bold mr-2 save2-button" name="form-2" type="submit"><span><i class="far fa-save"></i>{{ __('user-settings.save') }}</span></button>
                                <label>&nbsp;{{ __('user-settings.old-password-title') }}</label>
                                <input type="password" class="form-control @isset($badOldPassword) is-invalid @endisset" name="password_old" placeholder="{{ __('user-settings.old-password-title') }}..." autocomplete="off">
                                @isset($badOldPassword)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('user-settings.old-password') }}</strong>
                                    </span>
                                @endisset
                                <br><br>
                                <label>&nbsp;{{ __('user-settings.new-password') }}</label>
                                <input type="password" class="form-control @error('password_new') is-invalid @enderror" name="password_new" placeholder="{{ __('user-settings.new-password') }}..." autocomplete="off">
                                @error('password_new')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                                <input type="password" class="form-control @error('password_new_confrimation') is-invalid @enderror" name="password_new_confirmation" placeholder="{{ __('user-settings.new-password-again') }}..." autocomplete="off">
                                @error('password_new_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </form>

                        <input type="text" value="0" name="avatar-counter" id="hidden-avatar-input" hidden>
                        <div class="cancel-button">
                            <a href="{{ route('navigation.home', ['lang'=>app()->getLocale()]) }}" class="btn btn-secondary little-margined">{{ __('validation.Cancel') }}</a>
                        </div>
                    </div>
                       
                </div>
            </div>


    </div>
</div>

<script src="{{ asset('js/user-settings.js') }}"></script>

@endsection

