<!DOCTYPE html>
<html>
    <head>
        <title>PROJECT_X</title>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- Fontawesome icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Material Design Bootstrap -->
        <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">

        <!-- Your custom styles (optional) -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <!--Navbar-->
        <nav class="navbar navbar-dark navbar-fixed-top unique-color">

            <!-- Collapse button-->
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
                <i class="fa fa-bars"></i>
            </button>

            <div class="container">

                <!--Collapse content-->
                <div class="collapse navbar-toggleable-xs" id="collapseEx2">
                    <!--Navbar Brand-->
                    <a class="navbar-brand" href="#">PROJECT_X</a>
                    <!--Links-->
                    <ul class="nav navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">HOME<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">STUDY</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">TUTOR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CONTACT</a>
                        </li>
                    </ul>
                    <!--Search form-->
                    <form class="form-inline">
                        <input class="form-control" type="text" placeholder="Search">
                    </form>
                </div>
                <!--/.Collapse content-->
            </div>
        </nav>
        <!--/.Navbar-->

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
