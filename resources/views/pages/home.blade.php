@extends('layouts.app')

@section('head')
<style type="text/css">
  #home,#study,#tutor,#faq,#about_us,#contact_us
  {
    padding-bottom:15%;
  }
</style>
@stop

@section('content')
<!--Navbar-->
<nav class="navbar navbar-dark unique-color">

  <!-- Collapse button-->
  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
    <i class="fa fa-bars"></i>
  </button>
  <div class="container">
  <big>
    <!--Collapse content-->
    <div class="collapse navbar-toggleable-xs" id="collapseEx2">
      <!--Navbar Brand-->
      <a class="navbar-brand" href="http://nehruplace-store.in">PROJECT_X</a>
      <!--Links-->
      <ul class="nav navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" id="home_link">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="study_link">STUDY</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="tutor_link">TUTOR</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="faq_link">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="about_us_link">ABOUT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact_us_link">CONTACT US</a>
        </li>
      </ul>
      <!--Search form-->
      <form class="form-inline">
      <ul class="nav navbar-nav">
        <li class="nav-item">
          <a class="nav-link white-text" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        </li>
      </ul>
      </form>

    </div>
    <!--/.Collapse content-->
  </big>
  </div>
</nav>
<!--/.Navbar-->
<!-- Button trigger modal -->
<button type="button" id="add_more_info" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="display:none;">
    add_more_info
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/add_more_info') }}">
            {{ csrf_field() }}
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Kindly fill the following additional details.</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
            <!-- Main Form -->
            <div class="md-form">
                <i class="fa fa-calendar prefix"></i>
                <input type="text" id="user_DOB" class="form-control" name="DOB" value="{{ Auth::user()->DOB }}">
                <label for="user_DOB">Date of birth (DD/MM/YYYY)</label>
            </div>
            <div class="md-form">
                <i class="fa fa-globe prefix"></i>
                <input type="text" id="user_country" class="form-control" name="country" value="{{ Auth::user()->country }}">
                <label for="user_country">Your country</label>
            </div>
            <div class="md-form">
                <i class="fa fa-phone prefix"></i>
                <input type="text" id="user_contact" class="form-control" name="contact" value="{{ Auth::user()->contact }}">
                <label for="user_contact">Your contact number </label>
            </div>
            <div class="md-form">
                <i class="fa fa-university prefix"></i>
                <input type="text" id="user_university" class="form-control" name="university" value="{{ Auth::user()->university }}">
                <label for="user_university">Your university </label>
            </div>
            <div class="md-form">
                <i class="fa fa-book prefix"></i>
                <input type="text" id="user_course" class="form-control" name="course" value="{{ Auth::user()->course }}">
                <label for="user_course">Your course </label>
            </div>
            <div class="md-form">
                <i class="fa fa-hand-o-right prefix"></i>
                <input type="text" id="user_referred_by" class="form-control" name="referred_by" value="{{ Auth::user()->referred_by }}">
                <label for="user_referred_by">Where did you heard about us?</label>
            </div>
            <fieldset class="form-group">
                <input type="checkbox" id="contact_checkbox" checked> contact me through registered e-mail.</label>
            </fieldset>
          
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- /.Live preview-->
<!-- HOME -->
<div class="container" id="home">
  <div class="row">
  <br/>
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="card card-block">
        <h3 class="card-title">Welcome {{ Auth::user()->name }}</h3>
        <p class="card-text">
        At Infroid, we believe that technology is bound to change with time. However, the information must be preserved irrespective of the changing technology. We aim to maintain the data and data-driven services in familiar manner irrespective of rapidly changing IT industry. Along with that, our major involvement is in the domain of health-care. Various IT services do exist in the field of health-care. However, providing a single platform for basic health-care services is a tough task. We try to bring various small health-care related services on one platform. There is one more thing we work on, Droids. Imagine a human like robot whom you could interact with and rely upon to handle your daily tasks. Well, we are putting some effort to make this dream a reality.<br/>
        We value open-source technologies and prefer using these for the services we offer, thus reducing the overall cost and improving the quality of the product.
        </p>
      </div>
    </div>
  </div>
</div>

<!-- STUDY -->
<div class="container" id="study" style="display:none;">
  <p align="center">Nothing to show right now.</p>
  <div class="row" style="display:none">
    <br/>
    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card card-block">
        <h3 class="card-title">Notification title</h3>
        <p class="card-text">Description</p>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card card-block">
        <h3 class="card-title">Notification title</h3>
        <p class="card-text">Description</p>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card card-block">
        <h3 class="card-title">Notification title</h3>
        <p class="card-text">Description</p>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="card card-block">
        <h3 class="card-title">Notification title</h3>
        <p class="card-text">Description</p>
      </div>
    </div>

  </div>
</div>

<!-- TUTOR -->
<div class="container" id="tutor" style="display:none;">
  <div class="row">
  <br/>
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="card card-block">
        <h3 class="card-title">Automation</h3>
        <p class="card-text">At Infroid, we value data. We know that every single bit of data is significant to the organizations they belong to. However, managing this data could be a troublesome job. Let it be manual data or even digital data, those days are long gone when one could wait for you to go manually pull off that records file from your record room or manually search it across numerous devices. Centralized digital data is the only solution that could help user get all the information they require at the time they need in just a few clicks. Talking technically, we do leverage the power of cloud computing as well as traditional custom server to provide you the best experience and privacy economically.<br/>
        Key variants of our automation service:<br/>
        <b>
        <ul>
          <li>Automation on Cloud</li>
          <li>Automation on Client server (Infroid Managed)</li>
          <li>Automation on Client server (Client Managed)</li>
          <li>Automation on Client Intranet (very small scale)</li>
        </ul>
        </b>
        At Infroid, we take care of automation at all scales i.e. small scale digitization to large scale organization automation. Our key <i>mantra</i> behind each automation task that we carry out is the user experience.<br/>
        We give concrete attention to the following points:<br/><br/>
        <p align="center"><b>Ease of Usage, Reliability, Multi-Platform Support, Seamless user experience</b></p>
        For us, automation is <i>anything that does not require human intervention to do some task</i>. Practically, the existing systems need some kind of human intervention. We try to be truly autonomous with our systems thus which makes them better than many of the existing automation solutions.
        </p>
      </div>
    </div>
  </div>
</div>

<!-- FAQ -->
<div class="container" id="faq" style="display:none;">
  <div class="row">
  <br/>
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="card card-block">
        <h3 class="card-title">Health-care</h3>
        <p class="card-text">Health-care is one of the primary concern, and we at Infroid feel no different. However, it could be clearly seen that a lot is yet to be done in this sector. Today, we have made significant progress in medical science, still we see people across globe finding it difficult to manage their own health. Reasons are many, for some, money may be the reason and for others time could be the reason. Some might be unaware of the progress of medical science and the potential it has in today's date while some might not even be knowing that they are already suffering from some disease. Some have become so reluctant towards the life that they keep ignoring their diseases while some might be over-concerned towards their health, which inhibits them to perform other tasks efficiently in life.

        We, at Infroid have come up with numerous services that might help each and every individual to enhance their health. Let it be a poor individual, who do not even have a smart-phone to those who are suffering due to excessive overdose of royal life.

         At Infroid, we believe that technology is bound to change with time. However, the information and knowledge obtained from past must be preserved. We aim to maintain the data driven services irrespective of technological changes. Along with that, our major involvements are in the domain of health-care and unmanned droids.
        </p>
      </div>
    </div>
  </div>
</div>

<!-- ABOUT US -->
<div class="container" id="about_us" style="display:none;">
  <div class="row">
  <br/>
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="card card-block">
        <h3 class="card-title">Droids</h3>
        <p class="card-text">From the science fictions to our day to day lives, technology have become an indispensable part. These developments in robotics are stopping nowhere soon and we are about to witness an era of droids (a sci-fi term used to denote human like robots). Let it be a companion or assistant, a care-taker or anything else, droids will soon be a reality.
        By using the latest discoveries of medical science combined with continuously evolving computational devices, days are not far away that we will have our own droid.
        To make this a reality, a lot of research and collaboration is required. Infroid is committed to contribute its resources and services to make this dream a reality. In particular, we are making efforts to make the technology behind this open for all so that a droid might not be propitiatory device but can serve you as an independent natural human being.
        Our first aim is to provide a platform for the development of the 'Project Baby Droid'.
        </p>
      </div>
    </div>
  </div>
</div>

<!-- CONTACT US -->
<div class="container" id="contact_us" style="display:none;">
  <div class="row">
  <br/>
    <div class="col-sm-12 col-md-12 col-lg-6">
      <div class="card card-block">
        <h3 class="card-title">Contact us</h3>
        <p class="card-text">
          <form>
            <div class="md-form">
                <i class="fa fa-user prefix"></i>
                <input type="text" id="contact_fullname" class="form-control">
                <label for="contact_fullname">Type your name</label>
            </div>
            <div class="md-form">
                <i class="fa fa-envelope prefix"></i>
                <input type="email" id="contact_email" class="form-control validate">
                <label for="contact_email" data-error="incorrect format" data-success="corrent format" aria-describedby="emailHelp">Type your email</label>
            </div>
            <div class="md-form">
                <i class="fa fa-pencil prefix"></i>
                <textarea type="text" id="new_token_description" class="md-textarea"></textarea>
                <label for="contact_description">How may we assist you?</label>
            </div>
            <fieldset class="form-group">
                <input type="checkbox" id="contact_checkbox" checked> contact me through registered e-mail.</label>
            </fieldset>
            <button type="submit" class="btn unique-color">Submit</button>
          </form>
        </p>
      </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-6">
      <div class="card">
        <img class="img-fluid" src="{{ asset('img/background/2.jpg') }}" style="min-width:100%; min-height:auto; background-height:auto; background-width:100%;"  alt="Card image cap">
        <div class="card-block">
          <h3 class="card-title">Location <a href="https://goo.gl/maps/7ZLMFmgX1bv" target="_blank" class="btn unique-color" style="border-radius:30px;width:50px;height:50px;line-height:50px;border-radius: 50%;text-align:center;"><i class="fa fa-map-marker fa-2x"></i></a></h3>
          <p class="card-text">Flat No. 1405, Marygold Tower, Divine Meadows,<br/> Sector 108, Noida - 201301</p>
        </div>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-fixed-bottom navbar-dark unique-color" style="max-height:10%;">
  <div class="container">
    <p style="width:100%;text-align:center;color:white;" class="text-fluid"><small><small>© {{ date("Y") }} Infroid. All rights reserved.</small></small></p>
  </div>
</nav>
@stop

@section('script')
<!-- SCRIPTS -->
<script>
{{ ((empty(Auth::user()->DOB))||(empty(Auth::user()->country))||(empty(Auth::user()->contact))||(empty(Auth::user()->university))||(empty(Auth::user()->course))||(empty(Auth::user()->referred_by))) ? $show=1 : $show=0 }}
@if ($show === 1)
    $("#add_more_info").trigger("click");
@endif
  $( "#home_link" ).click(function() {
    $( "#home_link" ).parent().addClass( "active" );
    $( "#study_link" ).parent().removeClass("active");
    $( "#tutor_link" ).parent().removeClass("active");
    $( "#faq_link" ).parent().removeClass("active");
    $( "#about_us_link" ).parent().removeClass("active");
    $( "#contact_us_link" ).parent().removeClass("active");
    $( "#study" ).hide( "fast");
    $( "#tutor" ).hide( "fast");
    $( "#faq" ).hide( "fast");
    $( "#about_us" ).hide( "fast");
    $( "#contact_us" ).hide( "fast");
    $( "#home" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
  $( "#study_link" ).click(function() {
    $( "#study_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#tutor_link" ).parent().removeClass("active");
    $( "#faq_link" ).parent().removeClass("active");
    $( "#about_us_link" ).parent().removeClass("active");
    $( "#contact_us_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#tutor" ).hide( "fast");
    $( "#faq" ).hide( "fast");
    $( "#about_us" ).hide( "fast");
    $( "#contact_us" ).hide( "fast");
    $( "#study" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
  $( "#tutor_link" ).click(function() {
    $( "#tutor_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#study_link" ).parent().removeClass("active");
    $( "#faq_link" ).parent().removeClass("active");
    $( "#about_us_link" ).parent().removeClass("active");
    $( "#contact_us_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#study" ).hide( "fast");
    $( "#faq" ).hide( "fast");
    $( "#about_us" ).hide( "fast");
    $( "#contact_us" ).hide( "fast");
    $( "#tutor" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
  $( "#faq_link" ).click(function() {
    $( "#faq_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#study_link" ).parent().removeClass("active");
    $( "#tutor_link" ).parent().removeClass("active");
    $( "#about_us_link" ).parent().removeClass("active");
    $( "#contact_us_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#study" ).hide( "fast");
    $( "#tutor" ).hide( "fast");
    $( "#about_us" ).hide( "fast");
    $( "#contact_us" ).hide( "fast");
    $( "#faq" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
  $( "#about_us_link" ).click(function() {
    $( "#about_us_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#study_link" ).parent().removeClass("active");
    $( "#tutor_link" ).parent().removeClass("active");
    $( "#faq_link" ).parent().removeClass("active");
    $( "#contact_us_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#study" ).hide( "fast");
    $( "#tutor" ).hide( "fast");
    $( "#faq" ).hide( "fast");
    $( "#contact_us" ).hide( "fast");
    $( "#about_us" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
  $( "#contact_us_link" ).click(function() {
    $( "#contact_us_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#study_link" ).parent().removeClass("active");
    $( "#tutor_link" ).parent().removeClass("active");
    $( "#faq_link" ).parent().removeClass("active");
    $( "#about_us_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#study" ).hide( "fast");
    $( "#tutor" ).hide( "fast");
    $( "#faq" ).hide( "fast");
    $( "#about_us" ).hide( "fast");
    $( "#contact_us" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
</script>
@stop
