@extends('layouts.password-reset')

@section('content')

<style>
    .mg-top{
        margin-top: 25px;
    }
    .mg-more-top{
        margin-top: 90px;
    }

</style>
{{app()->setLocale(app('request')->input('lang'))}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mg-more-top">
                <div class="card-header">{{ __('validation.reset-password') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update', ['lang'=>app()->getLocale()])}}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mg-top">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('validation.E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mg-top">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('validation.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mg-top">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('validation.Confirm-password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0 mg-top">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('validation.reset-password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
