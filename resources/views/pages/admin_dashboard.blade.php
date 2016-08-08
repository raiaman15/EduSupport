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
          <a title="ASSIGN" id="assign_link" class="nav-link btn unique-color white-text" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;">
            <small><i class="fa fa-user-plus" aria-hidden="true"></i></small>
          </a>
        </li>
        <li class="nav-item">
          <a title="SETTINGS" id="setting_link" class="nav-link btn unique-color white-text" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;">
            <small><i class="fa fa-gears" aria-hidden="true"></i></small>
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
    <div class="card-group">
      <div class="card">
        <div class="card-block" align="center">
            <p class="card-text">
              <div id="temps_div" align="center"></div>
              @gaugechart('Temps', 'temps_div')
            </p>
        </div>
      </div>
    </div>
    <div class="card-group">
      <div class="card">
        <div class="table-responsive">
          <table class="table table-bordered table-sm table-hover">
            <thead>
              <tr>
                <th>Sender</th>
                <th>Message</th>
                <th>Sent at</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tokens as $token)
                <tr><td>{{ $token->name }}<br/><small class="text-muted">{{ $token->email }}</small></td><td><small><small>{{ $token->description }}</small></small></td><td><small>{{ $token->updated_at }}</small></td><td></td></tr>
              @endforeach
              <tr><td colspan="4" align="center"><nav>{{ $tokens->links() }}</nav></td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ASSIGN -->
<div class="container" id="tutor" style="display:none;">
  <div class="row">
    <div class="card-group">
      <div class="card">
        <div class="table-responsive">
          <table class="table table-bordered table-sm table-hover">
            <thead>
              <tr>
                <th>Sender</th>
                <th>Institution</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Sent at</th>
                <th>Assign to</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($seek_assistances as $seek_assistance)
                <tr>
                  <td>{{ $seek_assistance->name }}<br/><small class="text-muted">{{ $seek_assistance->email }}</small></td>
                  <td>{{ $seek_assistance->university }}<br/><small class="text-muted">{{ $seek_assistance->country }}</small></td>
                  <td>{{ $seek_assistance->subject }}<br/><small class="text-muted">{{ $seek_assistance->course }}</small></td>
                  <td><small><small>{{ $seek_assistance->description }}</small></small></td>
                  <td><small>{{ $seek_assistance->updated_at }}</small></td>
                  <td></td>
                  <td></td>
                </tr>
              @endforeach
              <tr><td colspan="4" align="center"><nav>{{ $tokens->links() }}</nav></td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- SETTINGS -->
<div class="container" id="why_us" style="display:none;">
  <div class="row">
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
    $( "#tutor_link" ).parent().removeClass("active");
    $( "#why_us_link" ).parent().removeClass("active");
    $( "#tutor" ).hide( "fast");
    $( "#why_us" ).hide( "fast");
    $( "#home" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
  
  $( "#assign_link" ).click(function() {
    $( "#tutor_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#why_us_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#why_us" ).hide( "fast");
    $( "#tutor" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
  
  $( "#setting_link" ).click(function() {
    $( "#why_us_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#tutor_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#tutor" ).hide( "fast");
    $( "#why_us" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
</script>
@stop
