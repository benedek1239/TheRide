<style>
    .mg-righted{
        margin-right: 10px;
    }
    .form-group-2{
        margin-bottom: 1.75rem;
    }
    #image-input{
        position: relative;
        z-index: 1;
        height: 0;
        width: 0;
        opacity: 0;
    }
    .choosable-profile{
        width: 70px;
        height: 70px;
        background-color: #1BC5BD;
        color: #ffffff;
        border-radius: 50%;
        display: inline-block;
        margin-left: 20px;
        margin-top: 15px; 
        cursor: pointer;  
    }
    .choosable-profile:hover{
        background-color: #91f3ee;
    }
    .margined{
        margin: 9px;
        margin-top: 10px;   
    }
    .avatar-container{
        margin: 20px;
        padding: 1rem;
        height: 280px;
        overflow: auto;
        background: #E4E6EF;
        border-radius: 15px;
    }

    .little-margined{
        margin: 8px;
    }

    .avatar-container::-webkit-scrollbar {
        width: 15px;
    }

    .avatar-container::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey; 
        border-radius: 10px;
    }
    
    .avatar-container::-webkit-scrollbar-thumb {
        background: grey; 
        border-radius: 10px;
    }

    .avatar-container::-webkit-scrollbar-thumb:hover {
        background: #1BC5BD; 
    }

    .card-footer{
        text-align: center;
    }

    .filtered{
        filter: drop-shadow(3px 5px 7px black);
        background-color: #91f3ee;
    }

    .attached-img{
        width: 120px;
        height: 120px !important;
        object-fit: cover;
    }

    @media screen and (max-width: 360px) {
        .choosable-profile{
            margin-left: 8px;
        }
        .avatar-container{
            padding: 0rem;
        }
        .avatar-container::-webkit-scrollbar {
            width: 6px;
        }
    }
</style>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bolder font-size-h3">{{ __('validation.Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register', ['lang'=>app()->getLocale()]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                        <div class="form-group-2">
                            <label for="name">{{ __('validation.Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group-2">
                            <label for="email" >{{ __('validation.E-mail') }}</label>
                            <input id="email-input-field" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group-2">
                            <label for="password" >{{ __('validation.Password') }}</label>
                            <input id="password-input-field" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group-2">
                            <label for="password-confirm">{{ __('validation.Confirm-password') }}</label>
                            <input id="password-confirm-input-field" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>
                         <!--begin::Nav Panel Widget 1-->
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-body">
                                <div class="d-flex justify-content-between flex-column pt-4 h-100">
                                    <div class="pb-5">
                                        <div class="d-flex flex-column flex-center">
                                            <div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
                                                <span class="symbol-label">
                                                    <img src="{{ asset('images/avatars/0.svg') }}" class="h-75 align-self-end" id="profile-picture"/>
                                                </span>
                                            </div>
                                            <label class="card-title font-weight-bolder text-dark-75 font-size-h4 m-0 pt-7 pb-1">{{ __('validation.profile-picture') }}</label>
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
                                        <label class="btn btn-light-warning font-weight-bold mr-2">
                                            <span><i class="flaticon-attachment"></i>{{ __('validation.attach-image') }}</span>
                                            <input type="file" name="media" id="image-input" />
                                        </label>                                   
                                    </div>
                            </div>
                        </div>
                    </div>
                        <div class="form-group-2" style="display: inline">
                            <div  style="display: inline-block; margin-bottom: 5px;">
                                <label class="checkbox checkbox-success">
                                    <input type="checkbox" name="Checkbox1">
                                    <span class="mg-righted" id="terms-checkbox"></span>
                                </label>
                            </div>
                            <div  style="display: inline">
                                {{ __('validation.accept-the') }} &nbsp;<a href="{{ route('navigation.terms', ['lang'=>app()->getLocale()]) }}" target="_blank" > {{ __('validation.terms-conditions') }} </a> &nbsp;<a href="{{ route('navigation.privacy', ['lang'=>app()->getLocale()]) }}" target="_blank" > {{ __('validation.privacy-policy') }} </a>
                                @error('Checkbox1')
                                    <label class="invalid-feedback d-flex" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </label>
                                @enderror
                            </div>
                        </div>
                        <input type="text" value="0" name="avatar-counter" id="hidden-avatar-input" hidden>
                        <div class="card-footer">
                            <a href="{{ route('navigation.home', ['lang'=>app()->getLocale()]) }}" class="btn btn-secondary little-margined">{{ __('validation.Cancel') }}</a>
                            <button id="register-btn" type="submit" class="btn btn-success mr-2">{{ __('validation.Register') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('avatar-0').classList.add('filtered');

    function choosed(clickedAvatar){
        for(i=0; i<50; ++i){
            document.getElementById(`avatar-${i}`).classList.remove('filtered');
        }
        clickedAvatar.classList.add('filtered');
        document.getElementById('profile-picture').classList.add('h-75');
        document.getElementById('profile-picture').classList.remove('attached-img');  
        document.getElementById('profile-picture').src = clickedAvatar.getElementsByTagName('img')[0].src;
        document.getElementById('hidden-avatar-input').value = clickedAvatar.getElementsByTagName('img')[0].id;
        document.getElementById('image-input').value = null;
    }

    document.getElementById('image-input').addEventListener('change', ()=>{
        var file = document.getElementById("image-input").files[0];
        var reader = new FileReader();
        reader.onloadend = function(){
            for(i=0; i<50; ++i){
                document.getElementById(`avatar-${i}`).classList.remove('filtered');
            }
            document.getElementById('profile-picture').classList.remove('h-75');
            document.getElementById('profile-picture').classList.add('attached-img');  
            document.getElementById('profile-picture').src = reader.result;        
        }
        if(file){
            reader.readAsDataURL(file);
        }
    });

</script>
@endsection





