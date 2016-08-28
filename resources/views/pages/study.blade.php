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
<!-- Your custom styles (optional) -->
<link href="{{ asset('css/star-rating.min.css') }}" rel="stylesheet">
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
        <a class="navbar-brand" href="{{ config('app.url') }}"><big>{{ config('app.app_name') }}</big></a>
        <ul class="nav navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" id="study_link" href="{{ url('/study') }}">LEARNER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="tutor_link" href="{{ url('/tutor') }}">FACILITATOR</a>
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
            <input type="text" id="user_DOB" class="form-control" name="DOB" value="{{ Auth::user()->DOB }}" autocomplete="off">
            <label for="user_DOB">Date of birth (DD/MM/YYYY)</label>
          </div>
          <div class="md-form">
            <i class="fa fa-globe prefix"></i>
            <input type="text" id="user_country" class="form-control" name="country" value="{{ Auth::user()->country }}" autocomplete="off">
            <label for="user_country">Your country</label>
          </div>
          <div class="md-form">
            <i class="fa fa-phone prefix"></i>
            <input type="text" id="user_contact" class="form-control" name="contact" value="{{ Auth::user()->contact }}" autocomplete="off">
            <label for="user_contact">Your contact number </label>
          </div>
          <div class="md-form">
            <i class="fa fa-university prefix"></i>
            <input type="text" id="user_university" class="form-control" name="university" value="{{ Auth::user()->university }}" autocomplete="off">
            <label for="user_university">Your university </label>
          </div>
          <div class="md-form">
            <i class="fa fa-graduation-cap prefix"></i>
            <input type="text" id="user_course" class="form-control" name="course" value="{{ Auth::user()->course }}" autocomplete="off">
            <label for="user_course">Your course </label>
          </div>
          <div class="md-form">
            <i class="fa fa-hand-o-right prefix"></i>
            <input type="text" id="user_referred_by" class="form-control" name="referred_by" value="{{ Auth::user()->referred_by }}" autocomplete="off">
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
              <input type="text" id="assistance_subject" name="assistance_subject" class="form-control validate" placeholder="SUBJECT NAME" required="required" autocomplete="off">
              <label for="assistance_subject">Subject in which you need assistance</label>
            </div>
            <div class="md-form">
              <i class="fa fa-pencil prefix"></i>
              <textarea type="text" id="assistance_description" name="assistance_description" class="md-textarea" autocomplete="off"></textarea>
              <label for="assistance_description">How may we assist you?</label>
            </div>
            <div class="md-form" style="padding-bottom:20px;">
              <i class="fa fa-file-text prefix"></i>
              <input type="file" name="assistance_document[]" id="assistance_document" multiple>
              <label for="assistance_document" style="margin-top:10px;">
                <small>Upload supporting documents (pdf/doc/docx/jpg/png format only)</small>
                <div id="file_upload_status" style="display:none;"><i class="fa fa-upload fa-2x" aria-hidden="true"></i><span id="file_upload_percentage"></span></div>
              </label>
            </div>
            <br/>
            <div class="md-form" align="center">
              <button type="submit" class="btn unique-color">Submit</button>
            </div>
          </form>
        </p>
      </div>
      @if (count($seeked_assistances) >= 1)
        <ul class="card list-group">
          <li class="list-group-item" align="center"><h3 class="card-title" align="center">Your Assistances</h3></li>
          @foreach ($seeked_assistances as $seeked_assistance)
            <li class="list-group-item" align="justify">
              @if (($seeked_assistance->payment_link_prepared) and (!$seeked_assistance->payment_done))
                <span class="pull-xs-right"><a href="payPremium/{{ $seeked_assistance->payment_plan }}/{{ $seeked_assistance->id }}" class="btn btn-primary-outline btn-sm" style="padding-top:0;padding-bottom:0;">PAY ${{$seeked_assistance->payment_plan*5}} <i class="fa fa-paypal" aria-hidden="true"></i></a></span>
              @endif
              @if (($seeked_assistance->payment_done) and ($seeked_assistance->tutor_assigned) and (!$seeked_assistance->tutor_payment_generated))
                <span class="pull-xs-right"><a href="#" class="btn btn-primary-outline btn-sm disabled" style="padding-top:0;padding-bottom:0;">ONGOING <i class="fa fa-check" aria-hidden="true"></i></a></span>
              @endif
              @if (($seeked_assistance->payment_done) and ($seeked_assistance->tutor_assigned) and ($seeked_assistance->tutor_payment_generated))
                <span class="pull-xs-right"><a href="#" class="btn btn-primary-outline btn-sm disabled" style="padding-top:0;padding-bottom:0;">COMPLETED <i class="fa fa-check" aria-hidden="true"></i></a></span>
              @endif
              <h5 class="list-group-item-heading">{{ $seeked_assistance->subject }}</h5>
              <br/>
              <span class="label btn-primary-outline label-pill pull-xs" style="min-width:100%;">{{ $seeked_assistance->status }}</span>
              <hr/>
              <small>{{ substr($seeked_assistance->description, 0, 200) }}...</small>
              <hr/>
              @if ($seeked_assistance->files !== "")
                <?php $files = explode("|", $seeked_assistance->files);$count=0;?>
                <h6 class="list-group-item-heading">
                  <a href="/download_syllabus/{{$seeked_assistance->university}}/{{$seeked_assistance->course}}/{{$seeked_assistance->subject}}" target="_blank">
                    <small><small>SYLLABUS</small></small>
                    <i class="fa fa-file-text fa-lg" aria-hidden="true"></i>
                  </a>
                  @foreach ($files as $file)
                    @if ($file !== "")
                      <?php $filepart = explode(":", $file);$count++;?>
                      <a href="/download/{{ $filepart[0] }}" target="_blank"><small><small>DOC{{$count}} </small></small><i class="fa {{ $filepart[1] }} fa-lg" aria-hidden="true"></i></a>
                    @endif
                  @endforeach
                </h6>
              @endif
              <hr/>
              @if (($seeked_assistance->payment_done) and ($seeked_assistance->tutor_assigned) and (!$seeked_assistance->tutor_payment_generated))
                <span class="pull-xs">
                <input type="text" class="kv-fa" data-size="xxs" value="{{ ($seeked_assistance->tutor_feedback)/2 }}" name="{{ $seeked_assistance->id }}" title="" style="display:none;">
                </span>
                <h5 class="list-group-item-heading"><small><small class="red-text">GIVE FEEDBACK ONLY AFTER COMPLETION</small></small></h5>
              @endif
              @if (($seeked_assistance->payment_done) and ($seeked_assistance->tutor_assigned) and ($seeked_assistance->tutor_payment_generated))
                <h5 class="list-group-item-heading"><small>YOUR FEEDBACK WAS : {{ $seeked_assistance->tutor_feedback }} / 10</small></h5>
              @endif
              
            </li>
          @endforeach
          @if($seeked_assistances->links())
            <li class="list-group-item" align="center"><nav>{{ $seeked_assistances->links() }}</nav></li>
          @endif
        </ul>
      @else
        <div class="card">
          <div class="card-block">
            <h4 class="card-title">About Seek Assistance</h4><hr/>
            <p class="card-text" align="justify">This is a premium service in which we assign a well educated trainer to assist you with a particular subject. The assistance could be foundation strengthening, doubt clearance, exam preparation, homework or assignment assistance, etc. The trainers value your time and thus try to take less time and deliver quality assistance.</p>
            <p class="card-text"><small class="text-muted">$20 - $50 per assistance based on requirement.</small></p>
          </div>
        </div>
      @endif
    </div>
    <div class="card-group">
      <div class="card">
        <div class="card-block">
          <h4 class="card-title">Course Guide</h4><hr/>
          <p class="card-text" align="justify">Our course guides will keep suggesting you various details related to your course. They might suggest you which extra knowledge you should have based on your course. They might also suggest various short term courses based on your main course to further enhance your knowledge.</p>
          <p class="card-text" align="right"><small class="text-muted">Pay $50 per year for your course.<br/><a href="#" class="btn btn-primary-outline btn-sm">ACTIVATE</a></small></p>
        </div>
      </div>
      <div class="card">
        <div class="card-block">
          <h4 class="card-title">Career Guide</h4><hr/>
          <p class="card-text" align="justify">Our career guides will keep suggesting you various details related to your career. They might suggest you which extra skills you should have based on your current course or career. They might also suggest various short term or long term courses based on your main career to further enhance your skills.</p>
          <p class="card-text" align="right"><small class="text-muted">Pay $50 per year for your career.<br/><a href="#" class="btn btn-primary-outline btn-sm">ACTIVATE</a></small></p>
        </div>
      </div>
      <div class="card">
        <div class="card-block">
          <h4 class="card-title">Job Guide</h4><hr/>
          <p class="card-text" align="justify">Our job guides will keep suggesting you various details related to your job. They might suggest you which extra certifications you should have based on your career or current job. They might also suggest various short term or long term or certification courses based on your job profile to enhance your productivity.</p>
          <p class="card-text" align="right"><small class="text-muted">Pay $50 per year for your job.<br/><a href="#" class="btn btn-primary-outline btn-sm">ACTIVATE</a></small></p>
        </div>
      </div>
    </div>
    <div class="card-group">
      <div class="card">
        <div class="card-block">
          <h4 class="card-title">G M A T Guide</h4><hr/>
          <p class="card-text" align="justify">Our course guides will keep suggesting you various details related to your course. They might suggest you which extra knowledge you should have based on your course. They might also suggest various short term courses based on your main course to further enhance your knowledge.</p>
          <p class="card-text" align="right"><small class="text-muted">Pay $50 per year.<br/><a href="#" class="btn btn-primary-outline btn-sm">ACTIVATE</a></small></p>
        </div>
      </div>
      <div class="card">
        <div class="card-block">
          <h4 class="card-title">G A T E Guide</h4><hr/>
          <p class="card-text" align="justify">Our career guides will keep suggesting you various details related to your career. They might suggest you which extra skills you should have based on your current course or career. They might also suggest various short term or long term courses based on your main career to further enhance your skills.</p>
          <p class="card-text" align="right"><small class="text-muted">Pay $50 per year.<br/><a href="#" class="btn btn-primary-outline btn-sm">ACTIVATE</a></small></p>
        </div>
      </div>
      <div class="card">
        <div class="card-block">
          <h4 class="card-title">C A T Guide</h4><hr/>
          <p class="card-text" align="justify">Our job guides will keep suggesting you various details related to your job. They might suggest you which extra certifications you should have based on your career or current job. They might also suggest various short term or long term or certification courses based on your job profile to enhance your productivity.</p>
          <p class="card-text" align="right"><small class="text-muted">Pay $50 per year.<br/><a href="#" class="btn btn-primary-outline btn-sm">ACTIVATE</a></small></p>
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
<!-- STAR RATING -->
<script type="text/javascript" src="{{ URL::asset('js/star-rating.min.js')}}"></script>
<script>
$('.kv-fa').rating({
    theme: 'krajee-fa',
    filledStar: '<i class="fa fa-star"></i>',
    emptyStar: '<i class="fa fa-star-o"></i>',
    clearButton: '<i class="fa fa-times-circle-o fa-lg"></i>'
});
$('.kv-fa').on('change', function () 
  {
    //alert("/tutor_feedback/" + $(this).attr( "name" ) + "/" + $(this).val()*2);
    //console.log('Rating selected: ' + $(this).val());
    window.location.href = "/tutor_feedback/" + $(this).attr( "name" ) + "/" + $(this).val()*2;
  });

{{ ((empty(Auth::user()->DOB))||(empty(Auth::user()->country))||(empty(Auth::user()->contact))||(empty(Auth::user()->university))||(empty(Auth::user()->course))||(empty(Auth::user()->referred_by))) ? $show=1 : $show=0 }}
@if ($show === 1)
    $("#add_more_info").trigger("click");
    $('#help_message_seek_assistance').show( "fast");
    $('#help_message_seek_assistance').removeClass("bq-success");
    $('#help_message_seek_assistance').addClass("bq-danger");
    $('#message_seek_assistance').html("You need to complete your profile details in order to use the Seek Assistance service");
    $('#seek_assistance_card').hide( "fast");
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
              $('#file_upload_percentage').html((e.loaded/e.total)*100 + "%");
          }
      }
      request.onloadstart = function (e) {
          $('#file_upload_status').show("fast");
      }
      request.onloadend = function (e) {
          $('#file_upload_status').hide("fast");
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
    $( "#user_country" ).autocomplete({
      source: "autocomplete/country",
      minLength: 2,
      select: function(event, ui) {
        $('#user_country').val(ui.item.value);
      }
    });
    $( "#user_university" ).autocomplete({
      source: "autocomplete/university",
      minLength: 2,
      select: function(event, ui) {
        $('#user_university').val(ui.item.value);
      }
    });
    $( "#user_course" ).autocomplete({
      source: "autocomplete/course",
      minLength: 2,
      select: function(event, ui) {
        $('#user_course').val(ui.item.value);
      }
    });
    $( "#assistance_subject" ).autocomplete({
      source: "autocomplete/subject",
      minLength: 2,
      select: function(event, ui) {
        $('#assistance_subject').val(ui.item.value);
      }
    });
  });
</script>
@stop
