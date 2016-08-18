@extends('layouts.app')

@section('head')
<style type="text/css">
  #home,#assist_student,#verify_tutor,#setting
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
          <a title="LEARNER REQUESTS" id="assist_student_link" class="nav-link btn unique-color white-text" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;">
            <small><i class="fa fa-user" aria-hidden="true"></i></small>
          </a>
        </li>
        <li class="nav-item">
          <a title="FACILITATOR VERIFICATION" id="verify_tutor_link" class="nav-link btn unique-color white-text" style="width:30px;height:30px;line-height:20px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;margin:5px 5px 5px 5px;">
            <small><i class="fa fa-user-secret" aria-hidden="true"></i></small>
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
      @if(count($tokens)>0)
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
                @if($token->links())
                <tr><td colspan="7" align="center"><nav>{{ $token->links() }}</nav></td></tr>
              @endif
              </tbody>
            </table>
          </div>  
        </div>
      @else
        <div class="card card-block">
          <h3 class="card-title">Sorry {{ Auth::user()->name }}</h3>
          <p class="card-text">
            No one tried to contact us. 
          </p>
        </div>
      @endif
    </div>
  </div>
</div>

<!-- ASSIST STUDENT -->
<div class="container" id="assist_student" style="display:none;">
  <div class="row">
    @if(count($seek_assistances)>0)
      <div class="card">
        @if(count($seek_assistances) >= 1)
          <ul class="card list-group">
            <li class="list-group-item" align="center"><h3 class="card-title" align="center">SEEKED ASSISTANCES</h3></li>
            @foreach ($seek_assistances as $seek_assistance)
              <li class="list-group-item" align="justify">
                <h5 class="list-group-item-heading">{{ $seek_assistance->subject }}</h5>
                <small>{{ $seek_assistance->description }}</small>
                @if ($seek_assistance->files !== "")
                <br/><br/>
                  <?php $files = explode("|", $seek_assistance->files);$count=0;?>
                  <h6 class="list-group-item-heading">ATTACHED FILES
                    @foreach ($files as $file)
                      @if ($file !== "")
                        <?php $filepart = explode(":", $file);$count++;?>
                        <a href="/download/{{ $filepart[0] }}" target="_blank"><small><small>{{$count}}</small></small><i class="fa {{ $filepart[1] }} fa-lg" aria-hidden="true"></i></a>
                      @endif
                    @endforeach
                  </h6>
                @endif
                <hr/>
                @if (!$seek_assistance->payment_link_prepared)
                  <br/>
                  <div class="md-form">
                      <input id="input_payment_plan" type="text" id="form1" class="form-control">
                      <label for="form1" class="">PAYMENT PLAN</label>
                  </div>
                  <a id="save_payment_plan" href="/save_payment_plan/{{ $seek_assistance->id }}/" class="btn btn-primary btn-sm">SAVE</a>
                  <br/><br/>
                @elseif (($seek_assistance->payment_done) and (!$seek_assistance->tutor_assigned))
                  <br/>
                  <div class="md-form">
                      <input id="input_assigned_tutor" type="text" id="form1" class="form-control">
                      <label for="form1" class="">ASSIGN TUTOR (name/email/subject)</label>
                  </div>
                  <a id="save_assigned_tutor" href="/save_assigned_tutor/{{ $seek_assistance->id }}/" class="btn btn-primary btn-sm">SAVE</a>
                  <br/><br/>
                @elseif (($seek_assistance->feedback_provided) and (!$seek_assistance->tutor_payment_generated))
                  <br/>
                  <div class="md-form">
                      <input id="input_tutor_payment" type="text" id="form1" class="form-control" value="{{ ($seek_assistance->payment_plan*4)+($seek_assistance->payment_plan*($seek_assistance->tutor_feedback/10)) }}" max="{{ ($seek_assistance->payment_plan*5) }}">
                      <label for="form1" class="">TUTOR PAYMENT (FROM : {{ ($seek_assistance->payment_plan*5) }}$)</label>
                  </div>
                  <a id="save_tutor_payment" href="/save_tutor_payment/{{ $seek_assistance->id }}/" class="btn btn-primary btn-sm">SAVE</a>
                  <br/><br/>
                @elseif (($seek_assistance->tutor_payment_generated) and (!$seek_assistance->tutor_got_payment))
                  <span class="pull-xs-right"><a href="#" class="btn btn-danger-outline btn disabled" style="padding-top:0;padding-bottom:0;"><i class="fa fa-times" aria-hidden="true"></i> TUTOR PAYMENT PENDING : {{ $seek_assistance->tutor_payment }}$</a></span>
                  <a href="/tutor_got_payment/{{ $seek_assistance->id }}" class="btn btn-primary btn-sm">ARLEADY PAID</a>
                  <br/><br/>
                @else
                  <span class="pull-xs-left"><a href="#" class="btn btn-success-outline btn disabled" style="padding-top:0;padding-bottom:0;"><i class="fa fa-check" aria-hidden="true"></i> NO ACTION REQUIRED</a></span>
                  <br/><br/>
                @endif
              </li>
            @endforeach
            @if($seek_assistances->links())
              <li class="list-group-item" align="center"><nav>{{ $seek_assistances->links() }}</nav></li>
            @endif
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
        @if($seek_assistances->links())
          <tr><td colspan="7" align="center"><nav>{{ $seek_assistances->links() }}</nav></td></tr>
        @endif   
      </div>
    @else
      <div class="card card-block">
          <h3 class="card-title">Sorry {{ Auth::user()->name }}</h3>
          <p class="card-text">
            No one seeked for assistance. 
          </p>
        </div>
    @endif
  </div>
</div>

<!-- VERIFY TUTOR -->
<div class="container" id="verify_tutor" style="display:none;">
  <div class="row">
    @if(count($provide_assistances)>0)
      <div class="card">
        <div class="table-responsive">
          <table class="table table-bordered table-sm table-hover">
            <thead>
              <tr>
                <th>TUTOR</th>
                <th>SPECIALIZATION</th>
                <th>QUALIFICATION</th>
                <th>ATTACHED DOCUMENTS</th>
                <th>APPROVE</th>
                <th>DELETE</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($provide_assistances as $provide_assistance)
                <tr>
                  <td align="center" style="vertical-align:middle;">
                    {{ $provide_assistance->name }}<br/>
                    <small class="text-muted">
                      <i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i> {{ $provide_assistance->email }}<br/>
                      <i class="fa fa-clock-o fa-lg" aria-hidden="true"></i> {{ $provide_assistance->updated_at }}
                    </small>
                  </td>
                  <td align="center" style="vertical-align:middle;">{{ $provide_assistance->subject }}<br/><small class="text-muted">{{ $provide_assistance->course }}, {{ $provide_assistance->university }}, {{ $provide_assistance->country }}</small></td>
                  <td align="justify" style="vertical-align:middle;"><small>{{ $provide_assistance->description }}</small></td>
                  <td align="center" style="vertical-align:middle;">
                    @if ($provide_assistance->files !== "")
                      <?php $files = explode("|", $provide_assistance->files);$count=0;?>
                      <h6 class="list-group-item-heading">
                        @foreach ($files as $file)
                          @if ($file !== "")
                            <?php $filepart = explode(":", $file);$count++;?>
                            <a href="/download/{{ $filepart[0] }}" target="_blank"><small><small>{{$count}}</small></small><i class="fa {{ $filepart[1] }} fa-lg" aria-hidden="true"></i></a>
                          @endif
                        @endforeach
                      </h6>
                    @endif
                  </td>
                  <td align="center" style="vertical-align:middle;">
                    <a title="LOGOUT" class="btn btn-success white-text" style="width:30px;height:30px;line-height:17px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;" href="/approve_tutor/{{ $provide_assistance->id }}">
                      <small><i class="fa fa-check fa-lg" aria-hidden="true"></i></small>
                    </a>
                  </td>
                  <td align="center" style="vertical-align:middle;">
                    <a title="LOGOUT" class="btn btn-danger white-text" style="width:30px;height:30px;line-height:17px;border-radius: 50%;text-align:center;padding:5px 0px 5px 0px;" href="/delete_tutor/{{ $provide_assistance->id }}">
                      <small><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></small>
                    </a>
                  </td>
                </tr>
              @endforeach
              @if($tokens->links())
                <tr><td colspan="7" align="center"><nav>{{ $provide_assistances->links() }}</nav></td></tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    @else
      <div class="card card-block">
          <h3 class="card-title">Sorry {{ Auth::user()->name }}</h3>
          <p class="card-text">
            No one applied as tutor. 
          </p>
        </div>
    @endif
  </div>
</div>

<!-- SETTINGS -->
<div class="container" id="setting" style="display:none;">
  <div class="row">
    <div class="card card-block">
      <h3 class="card-title">Welcome {{ Auth::user()->name }}</h3>
      <p class="card-text">
      Some text here
      </p>
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
    $( "#assist_student_link" ).parent().removeClass("active");
    $( "#verify_tutor_link" ).parent().removeClass("active");
    $( "#setting_link" ).parent().removeClass("active");
    $( "#assist_student" ).hide( "fast");
    $( "#verify_tutor" ).hide( "fast");
    $( "#setting" ).hide( "fast");
    $( "#home" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
  
  $( "#assist_student_link" ).click(function() {
    $( "#assist_student_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#verify_tutor_link" ).parent().removeClass("active");
    $( "#setting_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#verify_tutor" ).hide( "fast");
    $( "#setting" ).hide( "fast");
    $( "#assist_student" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });

  $( "#verify_tutor_link" ).click(function() {
    $( "#verify_tutor_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#assist_student_link" ).parent().removeClass("active");
    $( "#setting_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#assist_student" ).hide( "fast");
    $( "#setting" ).hide( "fast");
    $( "#verify_tutor" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });
  
  $( "#setting_link" ).click(function() {
    $( "#setting_link" ).parent().addClass( "active" );
    $( "#home_link" ).parent().removeClass("active");
    $( "#assist_student_link" ).parent().removeClass("active");
    $( "#verify_tutor_link" ).parent().removeClass("active");
    $( "#home" ).hide( "fast");
    $( "#assist_student" ).hide( "fast");
    $( "#verify_tutor" ).hide( "fast");
    $( "#setting" ).show( "fast");
    if ($(".navbar-toggleable-xs").hasClass("collapse in") === true) {
            $('.navbar-toggler').click();
        }
  });

  $('#save_payment_plan').click(function() {
    this.href = this.href + $('#input_payment_plan').val();
  });

  $('#save_assigned_tutor').click(function() {
    this.href = this.href + $('#input_assigned_tutor').val();
  });

  $('#save_tutor_payment').click(function() {
    this.href = this.href + $('#input_tutor_payment').val();
  });
</script>
@stop
