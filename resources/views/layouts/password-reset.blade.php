<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>The Ride</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->

    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>

    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/common.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
    


</head>
<style>
    body{   
        background: url("{{ asset('images/background4.png') }}");
        background-attachment: fixed;
        background-size: cover;    
        background-position: center;
        background-repeat: no-repeat;
        overflow-x:hidden; 
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 13px;
    }

</style>
@php($user = auth()->user())

<body>
    {{-- Top Menu --}}
    <input id="lang_id" hidden value={{ app()->getLocale() }}>

    @yield('content')

    <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
    <script>
        var KTAppSettings = {
"breakpoints": {
    "sm": 576,
    "md": 768,
    "lg": 1190,
    "xl": 1200,
    "xxl": 1200
},
"colors": {
    "theme": {
        "base": {
            "white": "#ffffff",
            "primary": "#6993FF",
            "secondary": "#E5EAEE",
            "success": "#1BC5BD",
            "info": "#8950FC",
            "warning": "#FFA800",
            "danger": "#F64E60",
            "light": "#F3F6F9",
            "dark": "#212121"
        },
        "light": {
            "white": "#ffffff",
            "primary": "#E1E9FF",
            "secondary": "#ECF0F3",
            "success": "#C9F7F5",
            "info": "#EEE5FF",
            "warning": "#FFF4DE",
            "danger": "#FFE2E5",
            "light": "#F3F6F9",
            "dark": "#D6D6E0"
        },
        "inverse": {
            "white": "#ffffff",
            "primary": "#ffffff",
            "secondary": "#212121",
            "success": "#ffffff",
            "info": "#ffffff",
            "warning": "#ffffff",
            "danger": "#ffffff",
            "light": "#464E5F",
            "dark": "#ffffff"
        }
    },
    "gray": {
        "gray-100": "#F3F6F9",
        "gray-200": "#ECF0F3",
        "gray-300": "#E5EAEE",
        "gray-400": "#D6D6E0",
        "gray-500": "#B5B5C3",
        "gray-600": "#80808F",
        "gray-700": "#464E5F",
        "gray-800": "#1B283F",
        "gray-900": "#212121"
    }
},
"font-family": "Poppins"
};
    </script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/js/pages/widgets.js?v=7.0.6') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    
    
    <script>

    $(document).ready(function() {
    $('.js-example-basic-single').select2();
    });

    </script>

</body>
</html>