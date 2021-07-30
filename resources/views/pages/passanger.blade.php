<style>
    .form-group-2{
        margin-bottom: 2rem;
    }
    .city-shower{
        margin-top: 0;
        border-top: none !important;
        border: 1px solid #E4E6EF;
        box-shadow: 0px 0px 50px 0px rgba(82, 63, 105, 0.15);
        border-top-right-radius: 0;
        border-top-left-radius: 0;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 98;
        display: none;
        float: left;
        min-width: 10rem;
        padding: 0.5rem 0;
        margin: 0.125rem 0 0;
        font-size: 1rem;
        color: #3F4254;
        text-align: left;
        list-style: none;
        background-color: #ffffff;
        background-clip: padding-box;
        height: auto !important;
        max-height: 300px !important;
        overflow: auto !important;
    }
    .show{
        display: block !important;
    }

    .hide{
        display: none !important;
    }
    
    .city-span{
        display: block;
        cursor: pointer;
        display: block;
        position: relative;
        outline: none !important;
        padding: 10px 15px;
    }

    .show-icon{
        display: inline !important;
    }

    .delete-icon{
        margin-left: 8px;
        color: #F64E60 !important;
        position: relative;
        top: -31px;
        left: -30px;
        cursor: pointer;
    }

</style>
@extends('layouts.app')
@section('content')
    <head>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    </head>

    
        <div class="container">
            <form action="{{ route('passanger.store') }}" method="POST" id="formPassanger">
                @csrf
                <div class="row justify-content-center" id="first">
                    <div class="col-md-6">
                        <div class="card" >
                            <div class="card-header" >{{ __('passanger.search') }}</div>
                                <div class="card-body" >
                                        <div class="card-body">
                                            <div class="form-1" id="form-1">
                                                <strong id="start_text">{{ __('passanger.from') }}</strong>
                                                <div class="col-sm-12">
                                                    <input type="text" class="hide" id="start" value="nothing" name="start_ride">
                                                    <input type="text" class="form-control" placeholder="{{ __('ride-create.select') }}" value="" id="start-input" autocomplete="off">
                                                    <div class="city-shower form-control hide" id="start-searcher">
                                                    </div>
                                                </div>
                                                <i class="fas fa-times-circle fa-2x delete-icon hide" id="start-cancel-icon"></i>

                                                <br />
                                                <strong id="finish_text">{{ __('passanger.where') }}</strong>
                                                <div class="col-sm-12">
                                                    <input type="text" class="hide" id="end" value="nothing" name="finish_ride">
                                                    <input type="text" class="form-control" placeholder="{{ __('ride-create.select') }}" value="" id="end-input" autocomplete="off">
                                                    <div class="city-shower form-control hide" id="end-searcher">
                                                    </div>
                                                </div>
                                                <i class="fas fa-times-circle fa-2x delete-icon hide" id="end-cancel-icon"></i>                                      
                                            </div>
                                            <div class="form-group-2">
                                                <label class="pt-6 form-3-label" id="passangerDate"><strong>{{ __('passanger.when') }}</strong></label>
                                                    
                                                <div>
                                                    <input type="date" class="form-control search-date-input" name="ridePassanger_date" id="ridePassanger_date" autocomplete="off">
                                                    
                                                    <i class="fas fa-times-circle fa-2x validation-icon" id="validation-icon-1"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success mr-2" id="passangerSearch-button">{{ __('passanger.search') }}</button>
                                            
                                            <a href= "{{ route('navigation.home',['lang' => app()->getLocale()]) }}" class="btn btn-secondary" id="passangerCancel-button">{{__('passanger.cancel')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            
            </form>
        </div>
        
        <script src="{{ asset('js/passanger.js') }}"></script>
        <script>document.getElementById('passanger-button').classList.add('menu-item-active')</script>


@endsection