@extends('layouts.app')

@section('head')
<style type="text/css">
  #home,#study,#tutor,#faq,#about_us,#contact_us
  {
    padding-bottom:50px;
  }
  .g-recaptcha {
      transform:scale(0.70);
  }
</style>
@stop

@section('content')
<!--Navbar-->
<nav class="navbar navbar-dark unique-color">
  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
    <i class="fa fa-bars"></i>
  </button>
  <div class="container">
    <big>
      <div class="collapse navbar-toggleable-xs" id="collapseEx2">
        <a class="navbar-brand" href="http://nehruplace-store.in"><big>PROJECT_X</big></a>
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
            <a class="nav-link" id="why_us_link">WHY US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact_us_link">CONTACT US</a>
          </li>
        </ul>
        <form class="form-inline">
          <button title="EDIT PROFILE" type="button" id="add_more_info" class="btn unique-color" data-toggle="modal" data-target="#myModal" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;">
            <small><i class="fa fa-pencil" aria-hidden="true"></i></small>
          </button>
          <a title="LOGOUT" class="btn unique-color white-text" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;" href="/logout">
            <small><i class="fa fa-sign-out" aria-hidden="true"></i></small>
          </a>    
        </form>
      </div>
    </big>
  </div>
</nav>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" role="form" method="POST" action="{{ url('/add_more_info') }}">
        {{ csrf_field() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Kindly fill the following additional details.</h4>
        </div>
        <div class="modal-body">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
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
  <div id="message"></div>
    <div class="card-group">
      <div id="seek_assistance_card" class="card card-block">
        <h3 class="card-title" align="center">Seek Assistance</h3>
        <p class="card-text">
          <form id="seek_assistance" class="form-horizontal" role="form" method="POST" action="{{ url('/seek_assistance') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="md-form">
              <i class="fa fa-user prefix"></i>
              <input type="text" id="assistance_fullname" name="assistance_fullname" class="form-control" value="{{ Auth::user()->name }}" disabled>
              <label for="assistance_fullname" class="disabled">Your name</label>
            </div>
            <div class="md-form">
              <i class="fa fa-envelope prefix"></i>
              <input type="email" id="assistance_email" name="assistance_email" class="form-control validate" value="{{ Auth::user()->email }}" disabled>
              <label for="assistance_email" data-error="incorrect format" data-success="corrent format" aria-describedby="emailHelp" class="disabled">Your email</label>
            </div>
            <div class="md-form">
              <i class="fa fa-book prefix"></i>
              <input type="text" id="assistance_subject" name="assistance_subject" class="form-control validate" placeholder="SUBJECT NAME - SUBJECT CODE" required="required">
              <label for="assistance_subject">Subject in which you need assistance</label>
            </div>
            <div class="md-form">
              <i class="fa fa-pencil prefix"></i>
              <textarea type="text" id="assistance_description" name="assistance_description" class="md-textarea"></textarea>
              <label for="assistance_description">How may we assist you?</label>
            </div>
            <div class="md-form" style="padding-bottom:20px;">
              <i class="fa fa-file-text prefix"></i>
              <input type="file" name="assistance_document[]" id="assistance_document" multiple>
              <label for="assistance_document" style="margin-top:10px;"><small>Upload supporting documents (pdf/doc/docx/jpg/png format only)</small></label>
            </div>
            <div class="md-form" align="center">
              <button type="submit" class="btn unique-color">Submit</button>
            </div>
          </form>
        </p>
      </div>
      <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(63).jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">About Seek Assistance</h4>
          <p class="card-text" align="justify">This is a premium service in which we assign a well educated trainer to assist you with a particular subject. The assistance could be foundation strengthening, doubt clearance, exam preparation, homework or assignment assistance, etc. The trainers value your time and thus try to take less time and deliver quality assistance.</p>
          <p class="card-text"><small class="text-muted">₹500 - ₹2000 per assistance based on requirement.</small></p>
        </div>
      </div>
    </div>
    <div class="card-group">
      <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(63).jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">Course Guide</h4>
          <p class="card-text">Our course guides will keep suggesting you various details related to your course. They might suggest you which extra knowledge you should have based on your course. They might also suggest various short term courses based on your main course to further enhance your knowledge.</p>
          <p class="card-text" align="right"><small class="text-muted">Just ₹5000 for one course. <a href="#" class="btn btn-primary-outline btn-sm">ACTIVATE</a></small></p>
        </div>
      </div>
      <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(62).jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">Career Guide</h4>
          <p class="card-text">Our career guides will keep suggesting you various details related to your career. They might suggest you which extra skills you should have based on your current course or career. They might also suggest various short term or long term courses based on your main career to further enhance your skills.</p>
          <p class="card-text" align="right"><small class="text-muted">Just ₹5000 for one course. <a href="#" class="btn btn-primary-outline btn-sm">ACTIVATE</a></small></p>
        </div>
      </div>
      <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(64).jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">Job Guide</h4>
          <p class="card-text">Our job guides will keep suggesting you various details related to your job. They might suggest you which extra certifications you should have based on your career or current job. They might also suggest various short term or long term or certification courses based on your job profile to further enhance your productivity.</p>
          <p class="card-text" align="right"><small class="text-muted">Just ₹5000 for one course. <a href="#" class="btn btn-primary-outline btn-sm">ACTIVATE</a></small></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- TUTOR -->
<div class="container" id="tutor" style="display:none;">
  <div class="row">
  <div id="message"></div>
    <div class="card-group">
      <div id="provide_assistance_card" class="card card-block">
        <h3 class="card-title" align="center">Provide Assistance</h3>
        <p class="card-text">
          <form id="provide_assistance" class="form-horizontal" role="form" method="POST" action="{{ url('/provide_assistance') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="md-form">
              <i class="fa fa-user prefix"></i>
              <input type="text" id="p_assistance_fullname" name="p_assistance_fullname" class="form-control" value="{{ Auth::user()->name }}" disabled>
              <label for="p_assistance_fullname" class="disabled">Your name</label>
            </div>
            <div class="md-form">
              <i class="fa fa-envelope prefix"></i>
              <input type="email" id="p_assistance_email" name="p_assistance_email" class="form-control validate" value="{{ Auth::user()->email }}" disabled>
              <label for="p_assistance_email" data-error="incorrect format" data-success="corrent format" aria-describedby="emailHelp" class="disabled">Your email</label>
            </div>
            <div class="md-form">
              <i class="fa fa-book prefix"></i>
              <input type="text" id="p_assistance_subject" name="p_assistance_subject" class="form-control validate" placeholder="SUBJECT NAME - SUBJECT CODE" required="required">
              <label for="p_assistance_subject">Subject in which you provide assistance</label>
            </div>
            <div class="md-form">
              <i class="fa fa-pencil prefix"></i>
              <textarea type="text" id="p_assistance_description" name="p_assistance_description" class="md-textarea"></textarea>
              <label for="p_assistance_description">What is your qualification?</label>
            </div>
            <div class="md-form" style="padding-bottom:20px;">
              <i class="fa fa-file-text prefix"></i>
              <input type="file" name="p_assistance_document[]" id="p_assistance_document" multiple>
              <label for="p_assistance_document" style="margin-top:10px;"><small>Upload your highest degrees certificate (pdf/doc/docx/jpg/png format only)</small></label>
            </div>
            <div class="md-form" align="center">
              <button type="submit" class="btn unique-color">ENROLL</button>
            </div>
          </form>
        </p>
      </div>
      <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(63).jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">About Provide Assistance</h4>
          <p class="card-text" align="justify">This is a premium service in which we assign a well educated trainer to assist our student clients with a particular subject. The assistance could be foundation strengthening, doubt clearance, exam preparation, homework or assignment assistance, etc. The trainers is bound to value client's time and thus try to take less time and deliver quality assistance.</p>
        </div>
        <div class="card-footer default-color-dark white-text" style="border-radius:0;">
            <p class="card-text"><small>Earn ₹400 - ₹1600 per assistance based on client's requirement.</small></p>
        </div>
      </div>
    </div>
    <div class="card-group">
      <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(63).jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">Course Guide</h4>
          <p class="card-text" align="justify">Our course guides will keep suggesting various details related to client's course. They might suggest client which extra knowledge they should have based on your course. They might also suggest various short term courses based on client's main course to further enhance their knowledge.</p>
          <p class="card-text" align="right"><small class="text-muted">Earn ₹4000 for one client. <a href="#" class="btn btn-primary-outline btn-sm">APPLY FOR COURSE GUIDE</a></small></p>
        </div>
      </div>
      <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(62).jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">Career Guide</h4>
          <p class="card-text" align="justify">Our career guides will keep suggesting various details related to client's career. They might suggest client which extra skills they should have based on their current course or career. They might also suggest various short term or long term courses based on client's main career to further enhance their skills.</p>
          <p class="card-text" align="right"><small class="text-muted">Earn ₹4000 for one client. <a href="#" class="btn btn-primary-outline btn-sm">APPLY FOR COURSE GUIDE</a></small></p>
        </div>
      </div>
      <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(64).jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">Job Guide</h4>
          <p class="card-text" align="justify">Our job guides will keep suggesting various details related to client's job. They might suggest client which extra certifications they should have based on their career or current job. They might also suggest various short term or long term or certification courses based on client's job profile to enhance their productivity.</p>
          <p class="card-text" align="right"><small class="text-muted">Earn ₹4000 for one client. <a href="#" class="btn btn-primary-outline btn-sm">APPLY FOR COURSE GUIDE</a></small></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- WHY US -->
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

<!-- CONTACT US -->
<div class="container" id="contact_us" style="display:none;">
  <div class="row">
    <div class="card-group">
      <div class="card card-block">
        <h3 class="card-title" align="center">Contact us</h3>
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
                <label for="new_token_description">How may we assist you?</label>
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
{{ ((empty(Auth::user()->DOB))||(empty(Auth::user()->country))||(empty(Auth::user()->contact))||(empty(Auth::user()->university))||(empty(Auth::user()->course))||(empty(Auth::user()->referred_by))) ? $show=1 : $show=0 }}
@if ($show === 1)
    $("#add_more_info").trigger("click");
    $('#message').addClass("alert alert-warning");
    $('#message').html("You need to complete your profile details in order to use the Seek Assistance service");
@endif
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
  $( "#study_link" ).click(function() {
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
  $( "#tutor_link" ).click(function() {
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
  
  $( "#why_us_link" ).click(function() {
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
  $( "#contact_us_link" ).click(function() {
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
  var form = document.getElementById('seek_assistance');
  var request = new XMLHttpRequest();
  form.addEventListener('submit', function(e){
      e.preventDefault();
      var formdata = new FormData(form);
      request.open('post', '/seek_assistance');
      request.addEventListener("load", transferComplete);
      request.send(formdata);
  });
  function transferComplete(data){
      response = JSON.parse(data.currentTarget.response);
      if(response.success){
          $('#message').removeClass("alert alert-warning");
          $('#message').addClass("alert alert-success");
          $('#message').html(response.message);
          $('#seek_assistance')[0].reset();
          $('#seek_assistance_card').hide( "fast");
      }
      else {
          $('#message').removeClass("alert alert-success");
          $('#message').addClass("alert alert-warning");
          $('#message').html(response.message);
      }
  }
</script>
@stop
