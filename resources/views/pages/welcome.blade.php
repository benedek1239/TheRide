@extends('layouts.app')

@section('content')
<style>
    body{   
        background: url("{{ asset('images/background4.png') }}");
        background-attachment: fixed;
        background-size: cover;    
        background-position: center;
        background-repeat: no-repeat;
    }
    .centered{
        margin-left: auto;
        margin-right: auto;
        margin-top: 80px;
    }
    #main-logo-img{
        width: 300px;
    }
    .menu-nav-btn{
        display: none;
        height: 80px;
        line-height: 60px;
        font-size: 16px;
    }
    .mg-top{
        margin-top: 26px;
    }
    .custom-icon{
        font-size: 2.4rem !important;
        padding-bottom: 0.55rem;
    }
    @media (max-width: 992px) {
        #main-logo-img{
            width: 200px;
        }
        .centered{
            margin-top: 0px !important;
        }
        .mobile-mode{
            display: block !important;
        }
    }


</style>

    <div class="centered">
        <img src="{{ asset('images/logo2.png') }}" id="main-logo-img">
        
        <a href="{{ route('navigation.rides', ['lang'=>app()->getLocale(), 'filter'=>'created_desc']) }}" class="btn btn-primary btn-lg font-weight-bold mr-2 menu-nav-btn btn-shadow mobile-mode"><i class="flaticon-like custom-icon"></i>{{ __('menus.looking-for-ride') }}</a>
        <a href="{{ route('navigation.ride-create', ['lang'=>app()->getLocale()]) }}" class="btn btn-info btn-lg font-weight-bold mr-2 menu-nav-btn mg-top btn-shadow mobile-mode"><i class="flaticon-users custom-icon"></i>{{ __('menus.looking-for-passanger') }}</a>

    </div>

<script>
    document.getElementById('home-button').classList.add('menu-item-active');
</script>

@endsection