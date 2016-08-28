@extends('layouts.app')

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
      <a class="navbar-brand" href="{{ config('app.url') }}">{{ config('app.app_name') }}</a>
    </div>
    <!--/.Collapse content-->
  </big>
  </div>
</nav>
<!--/.Navbar-->
<div class="container">
    <div class="row" align="center">
        <div class="col-md-3"></div>
        <div class="card col-md-6">
            <div class="card-block">
                <h4 class="card-title red-text"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> UNAUTHORIZED ACTION</h4>
                <p class="card-text">You must log in to access this zone. Please click <a href="{{ url('/login') }}">here</a> to log in.</p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

@endsection