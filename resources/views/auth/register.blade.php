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

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-header" align="center">
                    REGISTER
                </div>
                <div class="card-block">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <br/>
                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" required="required">
                            <label for="name">Complete name</label>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"></div>
                            <div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br/>
                        <div class="md-form">
                            <i class="fa fa-envelope prefix"></i>
                            <input type="email" id="email" class="form-control validate" name="email" value="{{ old('email') }}" required="required">
                            <label for="email" data-error="wrong format">Your email ID</label>
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
                        <div class="md-form">
                            <i class="fa fa-key prefix"></i>
                            <input type="password" id="password" class="form-control validate" name="password" value="{{ old('email') }}" required="required">
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
                        <div class="md-form">
                            <i class="fa fa-key prefix"></i>
                            <input type="password" id="password-confirm" class="form-control validate" name="password_confirmation" value="{{ old('email') }}" required="required">
                            <label for="password-confirm" data-error="wrong format">Re-type Password</label>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}"></div>
                            <div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br/>
                        <div class="md-form" align="center">
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
                        <br/>
                        <div class="md-form" align="center">
                            <div>
                                <button type="submit" class="btn unique-color">
                                    <i class="fa fa-btn fa-user-plus"></i> Register
                                </button>
                                <a class="btn btn-link unique-color white-text" href="{{ url('/login') }}"><i class="fa fa-btn fa-user"></i> Already registered?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
