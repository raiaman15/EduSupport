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
        <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-2" data-slide-to="1"></li>
                <li data-target="#carousel-example-2" data-slide-to="2"></li>
            </ol>
            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                <!--First slide-->
                <div class="carousel-item active">
                    <!--Mask color-->
                    <div class="view hm-black-light">
                        <img src="http://mdbootstrap.com/images/slides/slide%20(11).jpg" class="img-fluid" alt="">
                        <div class="full-bg-img">
                        </div>
                    </div>
                    <!--Caption-->
                    <div class="carousel-caption">
                        <div class="animated fadeInDown">
                            <h3 class="h3-responsive">Learn everything, better</h3>
                            <p>Quality professionals to assist you anytime. With custom assistance, you pay only for what you need.</p>
                        </div>
                    </div>
                    <!--Caption-->
                </div>
                <!--/First slide-->

                <!--Second slide-->
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view hm-black-strong">
                        <img src="http://mdbootstrap.com/images/slides/slide%20(15).jpg" class="img-fluid" alt="">
                        <div class="full-bg-img">
                        </div>
                    </div>
                    <!--Caption-->
                    <div class="carousel-caption">
                        <div class="animated fadeInDown">
                            <h3 class="h3-responsive">Teach and earn</h3>
                            <p>If you can teach well, you can earn well. With a wide range of subjects, courses and universities, you can surely contribute.</p>
                        </div>
                    </div>
                    <!--Caption-->
                </div>
                <!--/Second slide-->

                <!--Third slide-->
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view hm-black-slight">
                        <img src="http://mdbootstrap.com/images/slides/slide%20(13).jpg" class="img-fluid" alt="">
                        <div class="full-bg-img">
                        </div>
                    </div>
                    <!--Caption-->
                    <div class="carousel-caption">
                        <div class="animated fadeInDown">
                            <h3 class="h3-responsive">Quality comes first</h3>
                            <p>User feedback is directly proportional to the facilitator's payment. In case of complaints, we do listen.</p>
                        </div>
                    </div>
                    <!--Caption-->
                </div>
                <!--/Third slide-->
            </div>
            <!--/.Slides-->

            <!--Controls-->
            <a class="left carousel-control" href="#carousel-example-2" role="button" data-slide="prev">
                <span class="icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-2" role="button" data-slide="next">
                <span class="icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
        </div>
        <!--/.Carousel Wrapper-->
    </div>
</div>
@stop