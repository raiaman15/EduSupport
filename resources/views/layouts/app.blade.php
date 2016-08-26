<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>{{ env('APP_NAME') }}</title>

        <!-- Fontawesome icons -->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Material Design Bootstrap -->
        <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">

        <!-- Your custom styles (optional) -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- JQuery UI -->
        <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">

        <style type="text/css">
            .ui-autocomplete { z-index:2147483647; }
        </style>

        @yield('head')
    
    </head>
    <body>

        @yield('content')

        <!-- JQuery -->
        <script type="text/javascript" src="{{ URL::asset('js/jquery-2.2.3.min.js')}}"></script>

        <!-- JQuery UI -->
        <script type="text/javascript" src="{{ URL::asset('js/jquery-ui.min.js')}}"></script>

        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{ URL::asset('js/tether.min.js')}}"></script>

        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js')}}"></script>

        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{ URL::asset('js/mdb.min.js')}}"></script>

        @yield('script')
    </body>
</html>

