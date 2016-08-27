@extends('layouts.app')

@section('content')
<!--Navbar-->
<nav class="navbar navbar-dark unique-color">
  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
    <i class="fa fa-bars"></i>
  </button>
  <div class="container">
    <big>
      <div class="collapse navbar-toggleable-xs" id="collapseEx2">
        <a class="navbar-brand" href="{{ env('APP_URL') }}"><big>{{ env('APP_NAME') }}</big></a>
        <form class="form-inline">
            <a title="USER" href="/study" class="btn unique-color" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;"><i class="fa fa-rocket fa-lg" aria-hidden="true"></i></a>
            <a title="ADMIN" href="/admin_dashboard" class="btn unique-color" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></a>
        </form>
      </div>
    </big>
  </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <!--Carousel Wrapper-->
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
                <li data-target="#carousel" data-slide-to="3"></li>
            </ol>
            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                <!--First slide-->
                <div class="carousel-item active">
                    <!--Mask color-->
                    <div class="view hm-black-light">
                        <img src="{{ asset('img/background/front1.jpg') }}" class="img-fluid" style="min-width:100%;">
                        <div class="full-bg-img">
                        </div>
                    </div>
                    <!--Caption-->
                    <div class="carousel-caption">
                        <div class="animated fadeInDown">
                            <h3 class="h3-responsive">LEARN BETTER</h3>
                            <p><small>QUALITY ASSISTANCE ANYTIME</small></p>
                        </div>
                    </div>
                    <!--Caption-->
                </div>
                <!--/First slide-->

                <!--Second slide-->
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view hm-black-light">
                        <img src="{{ asset('img/background/front2.jpg') }}" class="img-fluid" style="min-width:100%;">
                        <div class="full-bg-img">
                        </div>
                    </div>
                    <!--Caption-->
                    <div class="carousel-caption">
                        <div class="animated fadeInDown">
                            <h3 class="h3-responsive">TEACH & EARN</h3>
                            <p><small>YOU TEACH WELL, YOU EARN WELL</small></p>
                        </div>
                    </div>
                    <!--Caption-->
                </div>
                <!--/Second slide-->

                <!--Third slide-->
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view hm-black-light">
                        <img src="{{ asset('img/background/front3.jpg') }}" class="img-fluid" style="min-width:100%;">
                        <div class="full-bg-img">
                        </div>
                    </div>
                    <!--Caption-->
                    <div class="carousel-caption">
                        <div class="animated fadeInDown">
                            <h3 class="h3-responsive">QUALITY IS PRIORITY</h3>
                            <p><small>YOUR FEEDBACK MATTERS MOST</small></p>
                        </div>
                    </div>
                    <!--Caption-->
                </div>
                <!--/Third slide-->

                <!--Fourth slide-->
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view hm-black-strong">
                        <img src="{{ asset('img/background/front4.jpg') }}" class="img-fluid" style="min-width:100%;">
                        <div class="full-bg-img">
                        </div>
                    </div>
                    <!--Caption-->
                    <div class="carousel-caption">
                        <div class="animated fadeInDown">
                            <h3 class="h3-responsive">EARN PART-TIME</h3>
                            <p><small>MERIT HOLDERS CAN TEACH HERE</small></p>
                        </div>
                    </div>
                    <!--Caption-->
                </div>
                <!--/Fourth slide-->
            </div>
            <!--/.Slides-->

            <!--Controls-->
            <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                <span class="icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                <span class="icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
        </div>
        <!--/.Carousel Wrapper-->
    </div>
</div>
@stop