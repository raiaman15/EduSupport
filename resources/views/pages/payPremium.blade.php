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
        <a class="navbar-brand" href="{{ env('APP_URL') }}"><big>{{ env('APP_NAME') }}</big></a>
        <form class="form-inline">
          <a title="LOGOUT" class="btn unique-color white-text" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;" href="/logout">
            <small><i class="fa fa-sign-out" aria-hidden="true"></i></small>
          </a>    
        </form>
      </div>
    </big>
  </div>
</nav>

<div class="container">
    <div class="row" align="center">
        <div class="col-md-3"></div>
        <div class="card col-md-6">
            <div class="card-block">
                <h4 class="card-title">PAYMENT DETAILS</h4>
                <p class="card-text">Kindly do not refresh the proceeding pages so as to keep your payment process smooth and secure.</p>
                <p class="card-text btn btn-primary-outline disabled">PAYMENT PLAN : {{ $payplan }} <br/>PAYMENT CHARGE : ${{ $payplan*5 }} <br/></p>
                <form action="{{ url('/getCheckout') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="assistance_id" value="{{ $id }}">
                    <input type="hidden" name="pay" value="{{ $payplan*5 }}">
                    <button class="btn btn-primary btn-lg">PROCEED TO PAYMENT</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<nav class="navbar navbar-fixed-bottom navbar-dark unique-color" style="min-height:40px;max-height:40px;">
  <div class="container">
    <p style="width:100%;text-align:center;color:white;font-size:10pt;" class="text-fluid">© {{ date("Y") }} Infroid. All rights reserved.</p>
  </div>
</nav>
@stop