@extends('layouts.app')

@section('content')
<nav class="navbar navbar-dark unique-color-dark">
  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
    <i class="fa fa-bars"></i>
  </button>
  <div class="container">
    <big>
      <div class="collapse navbar-toggleable-xs" id="collapseEx2">
        <a class="navbar-brand" href="{{ env('APP_URL') }}"><big>{{ env('APP_NAME') }}</big></a>
        <form class="form-inline">
          <a title="LOG IN" class="btn unique-color-dark white-text" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;" href="/login">
            <small><i class="fa fa-key" aria-hidden="true"></i></small>
          </a>    
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
                            <p><small>QUALITY ASSISTANCE, ANYTIME</small></p>
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
<div class="container" id="why_us">
  <div class="row" align="center">
    <div class="card-group">
      <div class="card">
          <div class="card-block">
              <h4 class="card-title"><u>Our Aim</u></h4>
              <p class="card-text">Every professional course comes with a lot of complications involved. Not everyone finds it easy to understand the complex concepts. Some find it difficult to prepare for exams while some are not even good with basic concepts. Whatever your problem may be, our services can help you out with facilitators for wide range of courses across numerous universities. Each and every facilitator is examined by our team to ensure the validity of his/her academic qualifications.</p>
              <p class="card-text">These professionals can help you in various ways. Let it be your assignments, your doubts, your examination preparation or even complete subject tution. Our facilitators are there to assist you so that you can learn better. Let learning be fun!</p>
          </div>
      </div>
    </div>
    <div class="card-group">
      <div class="card">
          <div class="card-block" style="padding-left:0;padding-right:0;padding-bottom:0;">
              <h4 class="card-title"><u>For Students</u></h4>
              <p class="card-text">
                <ul class="list-group">
                  <li class="list-group-item">Quality assistance anytime</li>
                  <li class="list-group-item">Requirement based payment</li>
                  <li class="list-group-item">Wide variety of assistance</li>
                  <li class="list-group-item">Your feedback matters most</li>
                </ul>
              </p>
          </div>
      </div>
      <div class="card">
          <div class="card-block" style="padding-left:0;padding-right:0;padding-bottom:0;">
              <h4 class="card-title"><u>For Teachers</u></h4>
              <p class="card-text">
                <ul class="list-group">
                  <li class="list-group-item">Provide assistance and earn</li>
                  <li class="list-group-item">Your qualification matters</li>
                  <li class="list-group-item">Wide variety of assistance</li>
                  <li class="list-group-item">Better teaching better pay</li>
                </ul>
              </p>
          </div>
      </div>
    </div>
    <div class="card-group">
      <div class="card">
          <div class="card-block" style="padding-left:0;padding-right:0;padding-bottom:0;">
              <h4 class="card-title"><u>Services we offer</u></h4>
              <ul class="list-group">
                <li class="list-group-item">Domain specific guides/experts</li>
                <li class="list-group-item">Help regarding CAT, GATE & GMAT preparation</li>
                <li class="list-group-item">Custom support for academics</li>
              </ul>
          </div>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-bottom navbar-dark unique-color-dark" style="min-height:40px;max-height:40px;">
  <div class="container">
    <p style="width:100%;text-align:center;color:white;font-size:8pt;" class="text-fluid">© {{ date("Y") }} Infroid. All rights reserved.
    </p>
  </div>
</nav>
@stop