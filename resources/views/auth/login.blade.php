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
      <a class="navbar-brand" href="http://nehruplace-store.in">PROJECT_X</a>
    </div>
    <!--/.Collapse content-->
  </big>
  </div>
</nav>
<!--/.Navbar-->

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-header" align="center">
                        LOGIN
                </div>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <br/>
                        <!--Email validation-->
                        <div class="md-form">
                            <i class="fa fa-envelope prefix"></i>
                            <input type="email" id="email" class="form-control validate" name="email" value="{{ old('email') }}">
                            <label for="email" data-error="wrong format">Registered email ID</label>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"></div>
                            <div>    
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br/>
                        <!--Password validation-->
                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="password" class="form-control validate" name="password">
                            <label for="password" data-error="wrong format">Password</label>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"></div>
                            <div> 
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br/>
                        <div class="form-group" align="center">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                                <button type="submit" class="btn unique-color">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                                <a class="btn btn-link unique-color white-text" href="{{ url('/register') }}"><i class="fa fa-btn fa-user-plus"></i> Register</a>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
