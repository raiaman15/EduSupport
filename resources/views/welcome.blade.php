<!DOCTYPE html>
<html>
    <head>
        <title>PROJECT_X</title>

        <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/mbd.min.css')}}" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                color: white;
                background-color: #0099CC;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">PROJECT_X</div>
            </div>
        </div>

        <!-- JQuery -->
        <script type="text/javascript" src="{{ URL::asset('js/jquery-2.2.3.min.js')}}"></script>

        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{ URL::asset('js/tether.min.js')}}"></script>

        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js')}}"></script>

        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{ URL::asset('js/mdb.min.js')}}"></script>
    </body>
</html>
