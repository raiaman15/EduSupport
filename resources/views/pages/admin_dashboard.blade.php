@extends('layouts.app')

@section('head')
<style type="text/css">
  #home,#study,#tutor,#faq,#about_us,#contact_us
  {
    padding-bottom:50px;
  }
  @-moz-document url-prefix() {
  fieldset { display: table-cell; }
  }
  .g-recaptcha {
      transform:scale(0.70);
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
      <a class="navbar-brand" href="http://nehruplace-store.in"><big>ADMIN_PROJECT_X</big></a>
      <!--Links-->
      <ul class="nav navbar-nav">
        <li class="nav-item active">
          <a title="HOME" id="home_link" class="nav-link btn unique-color white-text" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;">
            <small><i class="fa fa-home" aria-hidden="true"></i></small>
          </a>
        </li>
        <li class="nav-item">
          <a title="MESSAGE" id="message_link" class="nav-link btn unique-color white-text" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;">
            <small><i class="fa fa-envelope" aria-hidden="true"></i></small>
          </a>
        </li>
        <li class="nav-item">
          <a title="ASSIGN" id="assign_link" class="nav-link btn unique-color white-text" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;">
            <small><i class="fa fa-user-plus" aria-hidden="true"></i></small>
          </a>
        </li>
        <li class="nav-item">
          <a title="SETTINGS" id="setting_link" class="nav-link btn unique-color white-text" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;">
            <small><i class="fa fa-gears" aria-hidden="true"></i></small>
          </a>
        </li>
        <li class="nav-item">
          <a title="DISCUSSION" id="discussion_link" class="nav-link btn unique-color white-text" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;">
            <small><i class="fa fa-coffee" aria-hidden="true"></i></small>
          </a>
        </li>
      </ul>
      <!--Search form-->
      <form class="form-inline">
          <button title="EDIT PROFILE" type="button" id="add_more_info" class="btn unique-color" data-toggle="modal" data-target="#myModal" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;">
              <small><i class="fa fa-pencil" aria-hidden="true"></i></small>
          </button>
          <a title="LOGOUT" class="btn unique-color white-text" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;" href="/logout">
            <small><i class="fa fa-sign-out" aria-hidden="true"></i></small>
          </a>    
      </form>

    </div>
    <!--/.Collapse content-->
  </big>
  </div>
</nav>
<!--/.Navbar-->
<!-- Button trigger modal -->
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
  <!--Panel-->
  <div class="card">
      <div class="card-block" align="center">
          <h4 class="card-title"><u>SERVER STATUS</u></h4>
          <p class="card-text">
            <div id="temps_div" align="center"></div>
            @gaugechart('Temps', 'temps_div')
          </p>
          <a class="btn btn-primary">SERVER LOGS</a>

      </div>
  </div>
  <!--/.Panel-->
  </div>
</div>


<!-- MESSAGE -->
<div class="container" id="study" style="display:none;">
  <div class="row">
    <div class="card">
      <div class="table-responsive">
        <table class="table table-bordered table-sm table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Table heading</th>
              <th>Table heading</th>
              <th>Table heading</th>
              <th>Table heading</th>
              <th>Table heading</th>
              <th>Table heading</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>Table cell</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>Table cell</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>Table cell</td>
              <td>Table cell</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- ASSIGN -->
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

<!-- SETTINGS -->
<div class="container" id="why_us" style="display:none;">
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

<!-- DISCUSSION -->
<div class="container" id="contact_us" style="display:none;">
  <div class="row">
    <div class="card-group">
      <div class="card card-block">
        <h3 class="card-title">Contact us</h3>
        <p class="card-text">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/contact_send_mail') }}">
            {{ csrf_field() }}
            <div class="md-form">
                <i class="fa fa-user prefix"></i>
                <input type="text" id="contact_fullname" name="contact_fullname" class="form-control" value="{{ Auth::user()->name }}" disabled>
                <label for="contact_fullname" class="disabled">Your name</label>
            </div>
            <div class="md-form">
                <i class="fa fa-envelope prefix"></i>
                <input type="email" id="contact_email" name="contact_email" class="form-control validate" value="{{ Auth::user()->email }}" disabled>
                <label for="contact_email" data-error="incorrect format" data-success="corrent format" aria-describedby="emailHelp" class="disabled">Your email</label>
            </div>
            <div class="md-form">
                <i class="fa fa-pencil prefix"></i>
                <textarea type="text" id="new_token_description" name="new_token_description" class="md-textarea"></textarea>
                <label for="contact_description">How may we assist you?</label>
                <div>
                    @if ($errors->has('new_token_description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('new_token_description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group" align="center">
                {!! app('captcha')->display(); !!}
                <div>
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong>Kindly select the checkbox above.</strong>
                            <br/><small>This is necessary to ensure that you are not a bot.</small>
                        </span>
                    @endif
                </div>
            </div>
            <div class="md-form" align="center">
                <button type="submit" class="btn unique-color">Submit</button>
            </div>
          </form>
        </p>
      </div>
      <div class="card">
        <img class="img-fluid" src="{{ asset('img/background/2.jpg') }}" style="min-width:100%; min-height:auto; background-height:auto; background-width:100%;"  alt="Card image cap">
        <div class="card-block" width="100%">
          <h3 class="card-title" width="100%" align="left">Location <a href="https://goo.gl/maps/7ZLMFmgX1bv" target="_blank" class="btn unique-color" style="border-radius:30px;width:50px;height:50px;line-height:50px;border-radius: 50%;text-align:center;"><i class="fa fa-map-marker fa-2x"></i></a></h3>
          <p class="card-text">Flat No. 1405,<br/>Marygold Tower, Divine Meadows,<br/>Sector 108, Noida - 201301</p>
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
  $( "#home_link" ).click(function() {
    $( "#home_link" ).parent().addClass( "active" );
    $( "#study_link" ).parent().removeClass("active");
    $( "#tutor_link" ).parent().removeClass("active");
    $( "#why_us_link" ).parent().removeClass("active");
    $( "#contact_us_link" ).parent().removeClass("active");
    $( "#study" ).hide( "fast");
    $( "#tutor" ).hide( "fast");
    $( "#why_us" ).hide( "fast");
    $( "#contact_us" ).hide( "fast");
    $( "#home" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
  $( "#message_link" ).click(function() {
    $( "#study_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#tutor_link" ).parent().removeClass("active");
    $( "#why_us_link" ).parent().removeClass("active");
    $( "#contact_us_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#tutor" ).hide( "fast");
    $( "#why_us" ).hide( "fast");
    $( "#contact_us" ).hide( "fast");
    $( "#study" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
  $( "#assign_link" ).click(function() {
    $( "#tutor_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#study_link" ).parent().removeClass("active");
    $( "#why_us_link" ).parent().removeClass("active");
    $( "#contact_us_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#study" ).hide( "fast");
    $( "#why_us" ).hide( "fast");
    $( "#contact_us" ).hide( "fast");
    $( "#tutor" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
  
  $( "#setting_link" ).click(function() {
    $( "#why_us_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#study_link" ).parent().removeClass("active");
    $( "#tutor_link" ).parent().removeClass("active");
    $( "#contact_us_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#study" ).hide( "fast");
    $( "#tutor" ).hide( "fast");
    $( "#contact_us" ).hide( "fast");
    $( "#why_us" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
  $( "#discussion_link" ).click(function() {
    $( "#contact_us_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#study_link" ).parent().removeClass("active");
    $( "#tutor_link" ).parent().removeClass("active");
    $( "#why_us_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#study" ).hide( "fast");
    $( "#tutor" ).hide( "fast");
    $( "#why_us" ).hide( "fast");
    $( "#contact_us" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
</script>
@stop
