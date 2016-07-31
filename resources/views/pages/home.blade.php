@extends('layouts.app')

@section('head')
<style type="text/css">
  #home,#study,#tutor,#faq,#about_us,#contact_us
  {
    padding-bottom:50px;
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
  <div class="card-group">
    <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(63).jpg" alt="Card image cap">
        <div class="card-block">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
    <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(62).jpg" alt="Card image cap">
        <div class="card-block">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
    <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(64).jpg" alt="Card image cap">
        <div class="card-block">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
</div>
  <br/>
      <div class="card card-block">
        <h3 class="card-title">Welcome {{ Auth::user()->name }}</h3>
        <p class="card-text">
        Some text here
        </p>
      </div>
  </div>
</div>

<!-- STUDY -->
<div class="container" id="study" style="display:none;">
  <div class="row">
  <br/>
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="card card-block">
        <h3 class="card-title">Welcome {{ Auth::user()->name }}</h3>
        <p class="card-text">
        Some text here
        </p>
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
        <h3 class="card-title">Welcome {{ Auth::user()->name }}</h3>
        <p class="card-text">
        Some text here
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
        <h3 class="card-title">Welcome {{ Auth::user()->name }}</h3>
        <p class="card-text">
        Some text here
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
        <h3 class="card-title">Welcome {{ Auth::user()->name }}</h3>
        <p class="card-text">
        Some text here
        </p>
      </div>
    </div>
  </div>
</div>

<!-- CONTACT US -->
<div class="container" id="contact_us" style="display:none;">
  <div class="row">
  <br/>
    <div class="card-group">
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
      <div class="card">
        <img class="img-fluid" src="{{ asset('img/background/2.jpg') }}" style="min-width:100%; min-height:auto; background-height:auto; background-width:100%;"  alt="Card image cap">
        <div class="card-block" width="100%">
          <h3 class="card-title" width="100%" align="left">Location <a href="https://goo.gl/maps/7ZLMFmgX1bv" target="_blank" class="btn unique-color" style="border-radius:30px;width:50px;height:50px;line-height:50px;border-radius: 50%;text-align:center;"><i class="fa fa-map-marker fa-2x"></i></a></h3>
          <p class="card-text">Flat No. 1405, Marygold Tower, Divine Meadows,<br/> Sector 108, Noida - 201301</p>
        </div>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-fixed-bottom navbar-dark unique-color" style="min-height:40px;max-height:40px;">
  <div class="container">
    <p style="width:100%;text-align:center;color:white;font-size:10pt;" class="text-fluid">© {{ date("Y") }} Infroid. All rights reserved.</p>
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
