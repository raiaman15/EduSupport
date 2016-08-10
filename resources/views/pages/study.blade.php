@extends('layouts.app')

@section('head')
<style type="text/css">
  #study
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
            <a class="nav-link" id="study_link" href="{{ url('/study') }}">STUDY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="tutor_link" href="{{ url('/tutor') }}">TUTOR</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="why_us_link" href="{{ url('/why_us') }}">WHY US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact_us_link" href="{{ url('/contact_us') }}">CONTACT US</a>
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

<!-- STUDY -->
<div class="container" id="study">
  <div class="row">
    <div class="card-group">
      <blockquote id="help_message_seek_assistance" class="blockquote bq-danger" style="display:none;margin-bottom:0;">
        <p id="message_seek_assistance_title" class="bq-title"></p>
        <p id="message_seek_assistance"></p>
      </blockquote>
    </div>
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
              <input type="text" id="assistance_subject" name="assistance_subject" class="form-control validate" placeholder="SUBJECT NAME (SUBJECT CODE)" required="required">
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
      @if (count($seeked_assistances) >= 1)
        <ul class="card list-group">
          <li class="list-group-item" align="center"><h3 class="card-title" align="center">Previous Assistances</h3></li>
          @foreach ($seeked_assistances as $seeked_assistance)
            <li class="list-group-item">
              <small>SUBJECT : {{ $seeked_assistance->subject }}</small><br/>
              <small>DESCRIPTION : {{ $seeked_assistance->description }}</small>
            </li>
          @endforeach
          <li class="list-group-item" align="center"><nav>{{ $seeked_assistances->links() }}</nav></li>
        </ul>
      @else
        <div class="card">
          <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(63).jpg" alt="Card image cap">
          <div class="card-block">
            <h4 class="card-title">About Seek Assistance</h4>
            <p class="card-text" align="justify">This is a premium service in which we assign a well educated trainer to assist you with a particular subject. The assistance could be foundation strengthening, doubt clearance, exam preparation, homework or assignment assistance, etc. The trainers value your time and thus try to take less time and deliver quality assistance.</p>
            <p class="card-text"><small class="text-muted">₹500 - ₹2000 per assistance based on requirement.</small></p>
          </div>
        </div>
      @endif
    </div>
    <div class="card-group">
      <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(63).jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">Course Guide</h4>
          <p class="card-text">Our course guides will keep suggesting you various details related to your course. They might suggest you which extra knowledge you should have based on your course. They might also suggest various short term courses based on your main course to further enhance your knowledge.</p>
          <p class="card-text" align="right"><small class="text-muted">Pay ₹5000 for your course. <a href="#" class="btn btn-primary-outline btn-sm">ACTIVATE</a></small></p>
        </div>
      </div>
      <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(62).jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">Career Guide</h4>
          <p class="card-text">Our career guides will keep suggesting you various details related to your career. They might suggest you which extra skills you should have based on your current course or career. They might also suggest various short term or long term courses based on your main career to further enhance your skills.</p>
          <p class="card-text" align="right"><small class="text-muted">Pay ₹7500 for your career. <a href="#" class="btn btn-primary-outline btn-sm">ACTIVATE</a></small></p>
        </div>
      </div>
      <div class="card">
        <img class="img-fluid" src="http://mdbootstrap.com/images/reg/reg%20(64).jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">Job Guide</h4>
          <p class="card-text">Our job guides will keep suggesting you various details related to your job. They might suggest you which extra certifications you should have based on your career or current job. They might also suggest various short term or long term or certification courses based on your job profile to enhance your productivity.</p>
          <p class="card-text" align="right"><small class="text-muted">Pay ₹10000 for your job. <a href="#" class="btn btn-primary-outline btn-sm">ACTIVATE</a></small></p>
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
    $('#help_message_seek_assistance').show( "fast");
    $('#help_message_seek_assistance').removeClass("bq-danger");
    $('#help_message_seek_assistance').addClass("bq-success");
    $('#message_seek_assistance').html("You need to complete your profile details in order to use the Seek Assistance service");
@endif
  var form = document.getElementById('seek_assistance');
  var request = new XMLHttpRequest();
  form.addEventListener('submit', function(e){
      e.preventDefault();
      var formdata = new FormData(form);
      request.open('post', '/seek_assistance');
      request.addEventListener("load", seekTransferComplete);
      request.onprogress = function (e) {
          if (e.lengthComputable) {
              console.log(e.loaded+  " / " + e.total)
          }
      }
      request.onloadstart = function (e) {
          console.log("start")
      }
      request.onloadend = function (e) {
          console.log("end")
      }
      request.send(formdata);
  });
  function seekTransferComplete(data){
      var response = JSON.parse(data.currentTarget.response);
      if(response.success){
          $('#help_message_seek_assistance').removeClass("bq-danger");
          $('#help_message_seek_assistance').addClass("bq-success");
          $('#message_seek_assistance_title').html("<i class=\"fa fa-check-circle-o\" aria-hidden=\"true\"></i> SUBMISSION SUCCESFUL");
          $('#message_seek_assistance').html(response.message);
          $('#help_message_seek_assistance').show( "fast");
          $('#seek_assistance')[0].reset();
          $('#seek_assistance_card').hide( "fast");
      }
      else {
          $('#help_message_seek_assistance').removeClass("bq-success");
          $('#help_message_seek_assistance').addClass("bq-danger");
          $('#message_seek_assistance_title').html("<i class=\"fa fa-exclamation-circle\" aria-hidden=\"true\"></i> SUBMISSION FAILED");
          var message = JSON.parse(response.message);
          var out="";
          jQuery.each(message, function(i, val) {
            out += val + '<br/>';
          });

          $('#message_seek_assistance').html(out);
          $('#help_message_seek_assistance').show( "fast");
      }
  }
  $(function()
  {
     $( "#assistance_subject" ).autocomplete({
      source: "search/autocomplete",
      minLength: 3,
      select: function(event, ui) {
        $('#assistance_subject').val(ui.item.value);
      }
    });
  });
</script>
@stop
