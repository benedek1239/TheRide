<style>
    .diva {
        justify-content:center;
        display:flex;
        margin-top: 155px;
}

</style>
@extends('layouts.app')

@section('content')

@if ($errors)
    @if ($error = $errors->first('login'))

        <div class=" alert alert-danger diva">
            {{ __('login.log') }}
        </div>            
        <a class="text-center" href="{{ route('register',['lang' => app()->getLocale()]) }}"> {{ __('login.register2') }}</a>

    @endif
    
@endif
@endsection
