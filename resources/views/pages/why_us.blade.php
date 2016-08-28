@extends('layouts.app')

@section('head')
<style type="text/css">
  #why_us
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
        <a class="navbar-brand" href="{{ config('app.url') }}"><big>{{ config('app.app_name') }}</big></a>
        <ul class="nav navbar-nav pull-right">
          <li class="nav-item">
            <a class="nav-link" id="study_link" href="{{ url('/study') }}">LEARNER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="tutor_link" href="{{ url('/tutor') }}">FACILITATOR</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" id="why_us_link" href="{{ url('/why_us') }}">WHY US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact_us_link" href="{{ url('/contact_us') }}">CONTACT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"> </a>
          </li>
          @if (Auth::guest())
          <li class="nav-item">
              <a title="SIGN UP" class="nav-link" href="/login">
                <i class="fa fa-user-plus" aria-hidden="true"></i> SIGN UP
              </a>
          </li>
          <li class="nav-item">
              <a title="SIGN IN" class="nav-link" href="/login">
                <i class="fa fa-sign-in" aria-hidden="true"></i> SIGN IN
              </a>
          </li>
        @else
          
          <li class="nav-item">
              <a title="EDIT PROFILE" type="button" id="add_more_info" class="nav-link" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-user" aria-hidden="true"></i> PROFILE
              </a>
          </li>
          <li class="nav-item">
              <a title="SIGN OUT" class="nav-link" href="/login">
                <i class="fa fa-sign-out" aria-hidden="true"></i> SIGN OUT
              </a>
          </li>
        @endif
        </ul>
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

<!-- WHY US -->
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
  });
</script>
@stop
