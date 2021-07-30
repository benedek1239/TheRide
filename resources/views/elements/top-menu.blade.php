<head>
    <link href="{{ asset('css/top-menu.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/user-blade.css') }}" rel="stylesheet" type="text/css"/>

    <style>
        .dropdown-menu-mobile-language{
            
            right: -120px;
            top: 55px !important;
        }
        .dropdown-menu-desktop{
            top: 73px !important; 
        }

        .dropdown-menu-language{
            right: -135px;
            top: 70px;
        }
        .centered-link{
            text-align: center;
            margin-bottom: 5px;
        }
        .swipe-img{
            width: 80px;
            margin-left: 87px;
            margin-top: 60px;
            display: none;
        }
        @media screen and (max-width: 988px) {
            .swipe-img{
                display: block;
            }
        }

    </style>
</head>

<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile  header-mobile-fixed " >
	<div class=" align-items-center">

{{-- Languages --}}
    <!--begin::Languages-->
    <div class="dropdown" id="language-dropdown-mobile">
        <!--begin::Toggle-->
        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
            @php 
                $imgsrc = '115-hungary.svg';
                if(Route::getCurrentRoute()->parameters['lang']=='en'){
                    $imgsrc = "226-united-states.svg"; 
                } 
                if(Route::getCurrentRoute()->parameters['lang']=='hu'){
                    $imgsrc = "115-hungary.svg"; 
                } 
                if(Route::getCurrentRoute()->parameters['lang']=='ro'){
                    $imgsrc = "109-romania.svg"; 
                } 
                $currentRoute = Route::current();
            @endphp
            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                <img id="flag-main-icon" class="h-20px w-20px rounded-sm" src="{{ $imgsrc ? asset('assets/media/svg/flags/' . $imgsrc):'' }}" alt=""/>
            </div>
        </div>
        <!--end::Toggle-->
        <!--begin::Dropdown-->
        <div class="dropdown-menu dropdown-menu-mobile-language p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right mobile-dropdown-transformation">
            <!--begin::Nav-->
            <ul class="navi navi-hover py-4">
                <!--begin::Item-->
                <li class="navi-item">
                    <a href="{{ route($currentRoute->getName(), array_merge($currentRoute->parameters, ['lang' =>  'en'])) }}" class="navi-link">
                        <span class="symbol symbol-20 mr-3">
                            <img src="{{ asset('assets/media/svg/flags/226-united-states.svg') }}" alt=""/>
                        </span>
                        <span class="navi-text">English</span>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="navi-item active">
                <a href="{{ route($currentRoute->getName(), array_merge($currentRoute->parameters, ['lang' =>  'hu'])) }}" class="navi-link">
                        <span class="symbol symbol-20 mr-3">
                            <img src="{{ asset('assets/media/svg/flags/115-hungary.svg') }}" alt=""/>
                        </span>
                        <span class="navi-text">Magyar</span>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="navi-item">
                    <a href="{{ route($currentRoute->getName(), array_merge($currentRoute->parameters, ['lang' =>  'ro'])) }}" class="navi-link">
                        <span class="symbol symbol-20 mr-3">
                            <img src="{{ asset('assets/media/svg/flags/109-romania.svg') }}" alt=""/>
                        </span>
                        <span class="navi-text">Româna</span>
                    </a>
                </li>
                <!--end::Item-->
            </ul>
            <!--end::Nav-->
            </div>
            <!--end::Dropdown-->
        </div>
	</div>
    <!--end::Languages-->

    <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
        <span></span>
    </button>

    {{-- User menu mobile --}}
    @if($user)

    <link href="{{ asset('css/user-blade.css') }}" rel="stylesheet" type="text/css"/>
 
    <!--begin::User-->
   <div class="dropdown">
   
       <!--begin::Toggle-->
       <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
           <div class="btn btn-icon btn-clean h-40px w-40px btn-dropdown user-icon" id="user-icon-mobile">
               <span class="svg-icon svg-icon-lg">
                   <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                   <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                       <polygon points="0 0 24 0 24 24 0 24"/>
                       <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                       <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                   </g>
                   </svg>
                   <!--end::Svg Icon-->
               </span>
               </div>
               <span class="label label-light-danger label-rounded font-weight-bold font-1-rem user-icon-counter hide" id="user-icon-mobile-counter">
                0
                </span>
               </div>
               <!--end::Toggle-->
   
               <!--begin::Dropdown-->
               <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0" id="user-dropdown">
                   <!--begin::Header-->
                   <div class="d-flex align-items-center p-8 rounded-top">
                       <!--begin::Symbol-->
                       <div class="symbol symbol-md bg-light-primary mr-3 flex-shrink-0">
                           <img src="{{ $imgSrc }}" alt="" class="image-fit"/>
                       </div>
                       <!--end::Symbol-->
   
                       <!--begin::Text-->
                       <div class="text-dark m-0 flex-grow-1 mr-3 font-size-h5">{{ $user->name }}</div>
                       <!--end::Text-->
                   </div>
                       <div class="separator separator-solid"></div>
                   <!--end::Header-->
   
                   <!--begin::Nav-->
                   <div class="navi navi-spacer-x-0 pt-5">
                       <!--begin::Item-->
                       <a href="{{ route('users.show', ['lang'=>app()->getLocale(), 'user' => auth()->id()]) }}" class="navi-item px-8">
                           <div class="navi-link">
                               <div class="navi-icon mr-2">
                                   <i class="flaticon2-calendar-3 text-success"></i>
                               </div>
                               <div class="navi-text">
                                   <div class="font-weight-bold">
                                       {{ __('user.profile') }}
                                   </div>
                                   <div class="text-muted">
                                       {{ __('user.profile-alt') }}
                                       <span class="label label-light-danger label-inline font-weight-bold">{{ __('user.profile-alt-red') }}</span>
                                   </div>
                               </div>
                           </div>
                       </a>
                       <!--end::Item-->
   
                       <!--begin::Item-->
                       <a href="{{ route('navigation.chat', ['lang'=>app()->getLocale(), 'user_to'=>$user->id]) }}" class="navi-item px-8">
                           <div class="navi-link">
                               <div class="navi-icon mr-2">
                                <i class="fas fa-comments fa-1.5x text-primary" aria-hidden="true"></i>
                               </div>
                               <div class="navi-text">
                                   <div class="font-weight-bold">
                                       {{ __('user.messages') }}
                                       <span class="label label-light-danger label-rounded font-weight-bold font-1-rem" id="chat-span-counter-2">
                                        0
                                        </span>
                                   </div>
                               </div>
                           </div>
                       </a>
                       <!--end::Item-->
   
                       <!--begin::Item-->
                       <a href="{{ route('notifications.index', ['lang'=>app()->getLocale(), 'user' => auth()->id()]) }}"  class="navi-item px-8">
                           <div class="navi-link">
                               <div class="navi-icon mr-2">
                                   <i class="flaticon2-notification text-warning"></i>                               
                               </div>
                               <div class="navi-text">
                                   <div class="font-weight-bold">
                                       {{ __('user.notifications') }}
                                       <span class="label label-light-danger label-rounded font-weight-bold font-1-rem" id="html-notifications-number">
                                           {{ count($user->not_seened_notifications_for_me) }}
                                       </span>
                                   </div>
                               </div>
                           </div>
                       </a>
                       <!--end::Item-->
   
                       <!--begin::Item-->
                       <a href="{{ route('navigation.ratings', ['lang'=>app()->getLocale(), 'user' => auth()->id()]) }}" class="navi-item px-8">
                           <div class="navi-link">
                               <div class="navi-icon mr-2">
                                   <i class="flaticon-star text-primary reded"></i>
                               </div>
                               <div class="navi-text">
                                   <div class="font-weight-bold">
                                       {{ __('user.rating') }}
                                       @if($user->rating_counter != 0)
                                           {{ number_format($user->rating / $user->rating_counter, 1) }}
                                       @else
                                           {{ 0 }}  
                                       @endif
                                   </div>
                                   <div class="text-muted">
                                       {{ __('user.rating-alt') }}
                                   </div>
                               </div>
                           </div>
                       </a>
                       <!--end::Item-->
   
                       <!--begin::Footer-->
                       <div class="navi-separator mt-3"></div>
                       <div class="navi-footer  px-8 py-5">
                           <form id="frm-logout" action="{{ route('logout', ['lang'=>app()->getLocale()]) }}" method="POST">
                               @csrf
                               <button type="submit" class="btn btn-light-primary font-weight-bold">{{ __('user.sign-out') }}</button>
                           </form>
                       </div>
                       <!--end::Footer-->
                   </div>
                   <!--end::Nav-->
           </div>
           <!--end::Dropdown-->
   </div>
   <!--end::User-->
    
    @else
    {{-- Sign in --}}
 
         <!--   ITTTTT    -->
                <div class="dropdown " >
                    <!--begin::Toggle-->
                 <!--end::Toggle-->
 
                 <!--begin::Dropdown-->
                 <div class="topbar-item " data-toggle="dropdown" data-offset="-2px,25px">
                    <div class="mr-3 mt-1 btn btn-icon btn-clean h-45px w-45px btn-dropdown float-right">
                        {{ __('login.log-in') }}

                    </div>
                </div>
                    <div class="dropdown-menu dropdown-menu-desktop pt-5 p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0" id="user-dropdown-mobile">
                         
                        <!--begin::Nav-->
                        <form method="POST" id='loginFormMobile' action="{{ route('login', ['lang'=>app()->getLocale()]) }}" novalidate>
                            @csrf
                            
                            <div class="navi navi-spacer-x-0 pt-5">
                                    <!--begin::Item-->
                                    <div class="navi-item px-8 pb-10">
                                        <input id="email-input-1" type="email" value="{{ old('email') }}" class="mb-5 form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('login.email-placeholder') }}" autocomplete="off"/>
                                        <span style="color:red;  position:absolute; margin-top:-12px" id="email_error_mobile"></span>
                                    </div>
                                <!--end::Item-->
        
                                <!--begin::Item-->
                                    <div  class="navi-item px-8 pb-2">
                                        <input id="password-input-1" type="password" class="mb-5 form-control @error('password') is-invalid @enderror" name="password"  placeholder="{{ __('login.password-placeholder') }}" autocomplete="off"/>
                                        <span style="color:red; position:absolute; margin-top:-12px" id="password_error_mobile"></span>
                                    </div>
                                <!--end::Item-->
        
                                <!--begin::Footer-->
                                <div class="navi-separator mt-3"></div>
                                <div class="navi-footer px-8">
                                    <button id="login-btn-1" type="submit" class="btn btn-success sign-up-button mr-2">{{ __('login.sign-in') }}</button>
                                    <a href="{{ route('register', ['lang'=>app()->getLocale()]) }}" class="btn btn-primary sign-up-button mr-2"> {{ __('login.register') }}</a>
                                </div>
                                <div class="px-8 pb-4">
                                    <a href="/sign-in/facebook" class="btn btn-facebook form-control"><i class="socicon-facebook"></i>{{ __('login.facebook') }}</a>
                                </div>
                                <div class="centered-link">
                                    <a href="{{ route('navigation.password-reset', ['lang'=>app()->getLocale()]) }}" class="text-hover-primary">{{ __('login.forget-password') }}</a>
                                 </div>
                                <!--end::Footer-->
                            </div>
                        <!--end::Nav-->
                        </form>
                    </div>
                <!--end::Dropdown-->
                </div>
             {{-- ITTTTT --}}
         
         @endif
 </div>
 </div>
 </div>
 <!--end::Header Mobile-->


<!--begin::Header-->

<div id="kt_header" class="header flex-column  header-fixed " hold>
    <!--begin::Top-->
    <div class="header-top">

{{-- Languages --}}
    <!--begin::Languages-->
    <div class="dropdown" id="language-dropdown">
        <!--begin::Toggle-->
        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
            <?php 
            $imgsrc = '115-hungary.svg';
                if(Route::getCurrentRoute()->parameters['lang']=='en'){
                    $imgsrc = "226-united-states.svg"; 
                } 
                if(Route::getCurrentRoute()->parameters['lang']=='hu'){
                    $imgsrc = "115-hungary.svg"; 
                } 
                if(Route::getCurrentRoute()->parameters['lang']=='ro'){
                    $imgsrc = "109-romania.svg"; 
                } 
                $currentRoute = Route::current();
            ?>
            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                <img id="flag-main-icon" class="h-20px w-20px rounded-sm" src="{{ asset('assets/media/svg/flags/' . $imgsrc) }}" alt=""/>
            </div>
        </div>
        <!--end::Toggle-->
        <!--begin::Dropdown-->
        <div class="dropdown-menu dropdown-menu-language p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
            <!--begin::Nav-->
            <ul class="navi navi-hover py-4">
                <!--begin::Item-->
                <li class="navi-item">
                    <a href="{{ route($currentRoute->getName(), array_merge($currentRoute->parameters, ['lang' =>  'en'])) }}" class="navi-link">
                        <span class="symbol symbol-20 mr-3">
                            <img src="{{ asset('assets/media/svg/flags/226-united-states.svg') }}" alt=""/>
                        </span>
                        <span class="navi-text">English</span>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="navi-item active">
                <a href="{{ route($currentRoute->getName(), array_merge($currentRoute->parameters, ['lang' =>  'hu'])) }}" class="navi-link">
                        <span class="symbol symbol-20 mr-3">
                            <img src="{{ asset('assets/media/svg/flags/115-hungary.svg') }}" alt=""/>
                        </span>
                        <span class="navi-text">Magyar</span>
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="navi-item">
                    <a href="{{ route($currentRoute->getName(), array_merge($currentRoute->parameters, ['lang' =>  'ro'])) }}" class="navi-link">
                        <span class="symbol symbol-20 mr-3">
                            <img src="{{ asset('assets/media/svg/flags/109-romania.svg') }}" alt=""/>
                        </span>
                        <span class="navi-text">Română</span>
                    </a>
                </li>
                <!--end::Item-->
            </ul>
            <!--end::Nav-->
            </div>
            <!--end::Dropdown-->
    </div>
    <!--end::Languages-->
   
    {{-- Top menu --}}
         <!--begin::Container-->
         <div class="container ">
 			<!--begin::Header Menu Wrapper-->
                 <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                     <!--begin::Header Menu-->
                     <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile  header-menu-layout-default " >
                         <!--begin::Header Nav-->
                         <ul class="menu-nav ">
                             <!--begin::Home button-->
                             <li class="menu-item"  aria-haspopup="true" id="home-button">
                                 <a  href="{{ route('navigation.home', ['lang'=>app()->getLocale()]) }}" class="menu-link ">
                                     <span class="nav-icon w-auto">
                                         <i class="fas fa-home fa-2x menu-nav-icon"></i>
                                     </span> 
                                     <span  class="no-wrap n menu-text"></i>{{ __('menus.home') }}</span>
                                 </a>
                             </li>
                             <!--end::Home button-->
                             <!--begin::Ride button-->
                             <li class="menu-item"  aria-haspopup="true" id="rides-button">
                                     <a  href="{{ route('navigation.rides', ['lang'=>app()->getLocale(), 'filter'=>'created_desc']) }}" class="menu-link ">
                                         <span class="no-wrap nav-icon w-auto">
                                             <i class="fas fa-car fa-2x menu-nav-icon"></i>
                                         </span> 
                                         <span  class="no-wrap  n menu-text"></i>{{ __('menus.rides') }}</span>
                                     </a>
                                 </li>
                                 <!--end::Ride button-->
     
                                 <!--begin::Ride create button-->
                                 <li class="menu-item"  aria-haspopup="true" id="ride-create-button">
                                     <a  href="{{ route('navigation.ride-create', ['lang'=>app()->getLocale()]) }}" class="menu-link">
                                         <span class="nav-icon w-auto">
                                             <i class="fas fa-plus fa-2x menu-nav-icon"></i>
                                         </span> 
                                         <span class="no-wrap n menu-text"></i>{{ __('menus.ride-create') }}</span>
                                     </a>
                                 </li>
                                 <!--end::Ride create button-->
     
                                 <!--begin::Passanger button-->
                                 <li class="menu-item"  aria-haspopup="true" id="passanger-button">
                                     <a  href="{{ route('navigation.passanger', ['lang'=>app()->getLocale()]) }}" class="menu-link">
                                         <span class="nav-icon w-auto">
                                             <i class="fas fa-hand-paper fa-2x menu-nav-icon"></i>
                                         </span> 
                                         <span class="no-wrap n menu-text"></i>{{ __('menus.passanger') }}</span>
                                     </a>
                                 </li>
                                 <!--end::Passanger button-->
    <!--begin::Active rides button-->
                             <li class="menu-item"  aria-haspopup="true" id="active-rides-button">
                                     <a  href="{{ route('navigation.active-rides', ['lang'=>app()->getLocale()]) }}" class="menu-link">
                                         <span class="nav-icon w-auto">
                                             <i class="fas fa-map-marked-alt fa-2x menu-nav-icon"></i>
                                         </span> 
                                         <span class="no-wrap n menu-text"></i>{{ __('menus.active-rides') }}</span>
                                     </a>
                                 </li>
                                 <!--end::Active rides button-->
     
                             <!--begin::History button-->
                             <li class="menu-item"  aria-haspopup="true" id="history-button">
                                 <a  href="{{ route('navigation.history', ['lang'=>app()->getLocale()]) }}" class="menu-link">
                                     <span class="nav-icon w-auto">
                                        <i class="fas fa-history fa-2x menu-nav-icon"></i>
                                    </span> 
                                    <span  class="no-wrap n menu-text"></i>{{ __('menus.history') }}</span>
                             </a>
                         </li>
                         <!--end::History button-->
 
                         </ul>
                         <img class="swipe-img" src="{{ asset('images/swipe.png') }}">
                     </div>
 			    </div>
         </div>
     
         {{-- User menu --}}
         @if($user)

             <input type='hidden' id="signed-user-id" value="{{$user->id}}">

             <div id="desktop-user">
                <link href="{{ asset('css/user-blade.css') }}" rel="stylesheet" type="text/css"/>
 
                <!--begin::User-->
               <div class="dropdown">
               
                   <!--begin::Toggle-->
                   <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                       <div class="btn btn-icon btn-clean h-40px w-40px btn-dropdown user-icon" id="user-icon-desktop">
                           <span class="svg-icon svg-icon-lg">
                               <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                   <polygon points="0 0 24 0 24 24 0 24"/>
                                   <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                   <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                               </g>
                               </svg>
                               <!--end::Svg Icon-->
                           </span>
                           </div>
                           <span class="label label-light-danger label-rounded font-weight-bold font-1-rem user-icon-counter hide" id="user-icon-desktop-counter">
                            0
                            </span>
                           </div>
                           <!--end::Toggle-->
               
                           <!--begin::Dropdown-->
                           <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0" id="user-dropdown">
                               <!--begin::Header-->
                               <div class="d-flex align-items-center p-8 rounded-top">
                                   <!--begin::Symbol-->
                                   <div class="symbol symbol-md bg-light-primary mr-3 flex-shrink-0">
                                       <img src="{{ $imgSrc }}" alt="" class="image-fit"/>
                                   </div>
                                   <!--end::Symbol-->
               
                                   <!--begin::Text-->
                                   <div class="text-dark m-0 flex-grow-1 mr-3 font-size-h5">{{ $user->name }}</div>
                                   <!--end::Text-->
                               </div>
                                   <div class="separator separator-solid"></div>
                               <!--end::Header-->
               
                               <!--begin::Nav-->
                               <div class="navi navi-spacer-x-0 pt-5">
                                   <!--begin::Item-->
                                   <a href="{{ route('users.show', ['lang'=>app()->getLocale(), 'user' => auth()->id()]) }}" class="navi-item px-8">
                                       <div class="navi-link">
                                           <div class="navi-icon mr-2">
                                               <i class="flaticon2-calendar-3 text-success"></i>
                                           </div>
                                           <div class="navi-text">
                                               <div class="font-weight-bold">
                                                   {{ __('user.profile') }}
                                               </div>
                                               <div class="text-muted">
                                                   {{ __('user.profile-alt') }}
                                                   <span class="label label-light-danger label-inline font-weight-bold">{{ __('user.profile-alt-red') }}</span>
                                               </div>
                                           </div>
                                       </div>
                                   </a>
                                   <!--end::Item-->
               
                                   <!--begin::Item-->
                                   <a href="{{ route('navigation.chat', ['lang'=>app()->getLocale(), 'user_to'=>$user->id]) }}"  class="navi-item px-8">
                                       <div class="navi-link">
                                           <div class="navi-icon mr-2">
                                            <i class="fas fa-comments fa-1.5x text-primary" aria-hidden="true"></i>
                                           </div>
                                           <div class="navi-text">
                                               <div class="font-weight-bold">
                                                   {{ __('user.messages') }}
                                                   <span class="label label-light-danger label-rounded font-weight-bold font-1-rem" id="chat-span-counter-1">
                                                    0
                                                    </span>
                                               </div>
                                           </div>
                                       </div>
                                   </a>
                                   <!--end::Item-->
               
                                   <!--begin::Item-->
                                   <a href="{{ route('notifications.index', ['lang'=>app()->getLocale(), 'user' => auth()->id()]) }}"  class="navi-item px-8">
                                       <div class="navi-link">
                                           <div class="navi-icon mr-2">
                                               <i class="flaticon2-notification text-warning"></i>                               
                                           </div>
                                           <div class="navi-text">
                                               <div class="font-weight-bold">
                                                   {{ __('user.notifications') }}
                                                   <span class="label label-light-danger label-rounded font-weight-bold font-1-rem" id="html-notifications-number-desktop">
                                                       {{ count($user->not_seened_notifications_for_me) }}
                                                   </span>
                                               </div>
                                           </div>
                                       </div>
                                   </a>
                                   <!--end::Item-->
               
                                   <!--begin::Item-->
                                   <a href="{{ route('navigation.ratings', ['lang'=>app()->getLocale(), 'user' => auth()->id()]) }}" class="navi-item px-8">
                                       <div class="navi-link">
                                           <div class="navi-icon mr-2">
                                               <i class="flaticon-star text-primary reded"></i>
                                           </div>
                                           <div class="navi-text">
                                               <div class="font-weight-bold">
                                                   {{ __('user.rating') }}
                                                   @if($user->rating_counter != 0)
                                                       {{ number_format($user->rating / $user->rating_counter, 1) }}
                                                   @else
                                                       {{ 0 }}  
                                                   @endif
                                               </div>
                                               <div class="text-muted">
                                                   {{ __('user.rating-alt') }}
                                               </div>
                                           </div>
                                       </div>
                                   </a>
                                   <!--end::Item-->
               
                                   <!--begin::Footer-->
                                   <div class="navi-separator mt-3"></div>
                                   <div class="navi-footer  px-8 py-5">
                                       <form id="frm-logout" action="{{ route('logout', ['lang'=>app()->getLocale()]) }}" method="POST">
                                           @csrf
                                           <button type="submit" class="btn btn-light-primary font-weight-bold">{{ __('user.sign-out') }}</button>
                                       </form>
                                   </div>
                                   <!--end::Footer-->
                               </div>
                               <!--end::Nav-->
                       </div>
                       <!--end::Dropdown-->
               </div>
               <!--end::User-->
             </div>
         @else
     
         {{-- Sign in --}}
 
         <!--   ITTTTT    -->
            <div class="dropdown " id="desktop-user">
                <!--begin::Toggle-->
                <div class="topbar-item " data-toggle="dropdown" data-offset="-2px,25px">
                    <div class="mr-16 mt-4 btn btn-icon btn-clean h-45px w-45px btn-dropdown float-right" id="login-dropdown">
                        {{ __('login.log-in') }}
                    </div>
                </div>
            
               
            
                <!--end::Toggle-->
                <!--begin::Dropdown-->
             <div class="dropdown-menu dropdown-menu-desktop pt-5 p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0" id="user-dropdown-desktop">
                
                     <!--begin::Nav-->
                     <form method="POST" action="{{ route('login', ['lang'=>app()->getLocale()]) }}" id='loginFormDesktop'>
                         @csrf
                         <div class="navi navi-spacer-x-0 pt-5" id="login-menu">
                             <!--begin::Item-->
                             <div class="navi-item px-8 pb-10">
                                <input id="email-input" type="email" value="{{ old('email') }}" class="mb-5 form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('login.email-placeholder') }}" autocomplete="off"/>
                                <span style="color:red; position:absolute; margin-top:-12px" id="email_error_desktop"></span>
                            </div>
                              <!--end::Item-->
                              <!--begin::Item-->
                                <div  class="navi-item px-8 pb-2">
                                 <input id="password-input" type="password" class="mb-5 form-control @error('password') is-invalid @enderror" name="password"  placeholder="{{ __('login.password-placeholder') }}" autocomplete="off"/>
                                    <span style="color:red; position:absolute; margin-top:-12px" id="password_error_desktop"></span>    
                                </div>
                             
                             <!--end::Item-->
                                
                             <!--begin::Footer-->
                                <div class="navi-separator mt-3"></div>
                                 <div class="navi-footer  px-8">
                                    <button id="login-btn" type="submit" class="btn btn-success sign-up-button mr-2">{{ __('login.sign-in') }}</button>
                                    <a href="{{ route('register', ['lang'=>app()->getLocale()]) }}" class="btn btn-primary sign-up-button mr-2"> {{ __('login.register') }}</a>
                                 </div>
                                 <div class="px-8 pb-4">
                                    <a href="/sign-in/facebook" class="btn btn-facebook form-control"><i class="socicon-facebook"></i>{{ __('login.facebook') }}</a>
                                </div>                                 <div class="centered-link">
                                    <a href="{{ route('navigation.password-reset', ['lang'=>app()->getLocale()]) }}" class="text-hover-primary">{{ __('login.forget-password') }}</a>
                                 </div>

                                 <!--end::Footer-->
                             </div>

                            <!--end::Nav-->
                         </div>
                    </form>
                    <!--end::Dropdown-->
            </div>
                {{-- ITTTTT --}}
            </div>
        @endif
    </div>
     </div> 
     
     <audio controls id="notification-audio" muted hidden>
        <source src="{{ asset('soundEffects/notification.mp3') }}" type="audio/mpeg" >
    </audio>

     @if($user)
     <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.17.2/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.17.2/firebase-analytics.js"></script>

    <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyCjOOKcKffluR9ts0pMPgTb6WB766E6m7w",
        authDomain: "theride-57efd.firebaseapp.com",
        databaseURL: "https://theride-57efd.firebaseio.com",
        projectId: "theride-57efd",
        storageBucket: "theride-57efd.appspot.com",
        messagingSenderId: "332772373460",
        appId: "1:332772373460:web:540b7afbb629f970ebdc41",
        measurementId: "G-SHMSHM6HGW"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    </script>
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-firestore.js"></script>
        <script src="{{ asset('js/user-blade.js') }}"></script>

    @endif


     <script src="{{ asset('js/top-menu.js') }}"></script>


