@extends('layouts.app')

<!-- Main Content -->
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
                    RESET PASSWORD
                </div>
                <div class="card-block">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <br/>
                        <div class="md-form">
                            <i class="fa fa-envelope prefix"></i>
                            <input type="email" id="email" class="form-control validate" name="email" value="{{ old('email') }}" required="required">
                            <label for="email" data-error="wrong format">Your registered email ID</label>
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

                        <div class="form-group" align="center">
                            <div>
                                <button type="submit" class="btn unique-color">
                                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
