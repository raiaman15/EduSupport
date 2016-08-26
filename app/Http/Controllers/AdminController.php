<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Mail;
use App\Token;
use App\Seek_assistance;
use App\Provide_assistance;
use App\Country;
use App\University;
use App\Course;
use App\Subject;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Auth::check()) {
            $load = sys_getloadavg();
            $free = shell_exec('free');
            $free = (string)trim($free);
            $free_arr = explode("\n", $free);
            $mem = explode(" ", $free_arr[1]);
            $mem = array_filter($mem);
            $mem = array_merge($mem);
            $memory_usage = $mem[2]/$mem[1]*100;
            $dt = disk_total_space("/");
            $df = disk_free_space("/");
            $dup = (($dt-$df)/$dt)*100; //Disk used percentage
            $temps = \Lava::DataTable();

            $temps->addStringColumn('Type')
                  ->addNumberColumn('Value')
                  ->addRow(['CPU', round($load[0]*100)])
                  ->addRow(['MEMORY', round($memory_usage)])
                  ->addRow(['DISK', $dup]);

            \Lava::GaugeChart('Temps', $temps, [
                'width'      => 300,
                'greenFrom'  => 0,
                'greenTo'    => 69,
                'yellowFrom' => 70,
                'yellowTo'   => 89,
                'redFrom'    => 90,
                'redTo'      => 100,
                'majorTicks' => ['Safe','Critical']
            ]);

            $tokens = Token::paginate(5);
            $seek_assistances = Seek_assistance::where('payment_link_prepared', false)->orWhere('tutor_assigned', false)->orWhere('tutor_payment_generated', false)->orWhere('tutor_got_payment', false)->orderBy('updated_at', 'desc')->paginate(5);
            $provide_assistances = Provide_assistance::where('admin_approved', false)->orderBy('updated_at', 'desc')->paginate(5);
            return view("pages.admin_dashboard")->with('tokens',$tokens)->with('seek_assistances',$seek_assistances)->with('provide_assistances',$provide_assistances);
        }
        else
            return view('pages.welcome');
    }

    public function make_pay_link_student($id, $payment_plan){
        $seek_assistance = Seek_assistance::where('id', $id)->first();
        $seek_assistance->payment_link_prepared=true;
        $seek_assistance->payment_plan=$payment_plan; //an integer
        $seek_assistance->status="PROCEED WITH PAYMENT";
        $seek_assistance->save();
        return redirect('admin_dashboard');
    }

    public function save_assigned_tutor($id, $tutor_email){
        $seek_assistance = Seek_assistance::where('id', $id)->first();
        if($seek_assistance->payment_done)
        {
            $seek_assistance->tutor_assigned=true;
            $seek_assistance->tutor_email=$tutor_email; 
            $seek_assistance->status="TUTOR ASSIGNED : ".$tutor_email;
            $seek_assistance->save();
        }
        return redirect('admin_dashboard');
    }

    public function save_tutor_payment($id, $tutor_payment){
        $seek_assistance = Seek_assistance::where('id', $id)->first();
        if($tutor_payment<($seek_assistance->payment_plan*5))
        {
            $seek_assistance->tutor_payment_generated=true;
            $seek_assistance->tutor_payment=$tutor_payment; //an integer
            $seek_assistance->status="TUTOR PAYMENT GENERATED";
            $seek_assistance->save();
            return redirect('admin_dashboard');
        }
        else
        {
            dd("PAYING MORE THAN MAXIMUM AMOUNT");
        }
    }

    public function tutor_got_payment($id){
        $seek_assistance = Seek_assistance::where('id', $id)->first();
        $seek_assistance->tutor_got_payment=true;
        $seek_assistance->status="TUTOR GOT PAYMENT";
        $seek_assistance->save();
        return redirect('admin_dashboard');
    }

    public function approve_tutor($id){
        $provide_assistance = Provide_assistance::where('id', $id)->first();
        $provide_assistance->admin_approved=true;
        $provide_assistance->status="PROFILE ACTIVATED";
        $provide_assistance->save();
        return redirect('admin_dashboard');
    }

    public function delete_tutor($id){
        $provide_assistance = Provide_assistance::where('id', $id)->first();
        $subject=$provide_assistance->subject;
        $mailto=$provide_assistance->email;
        $provide_assistance->delete();
        Mail::send('email.provide_assistance_not_approved',['subject' => $subject], function ($m) use ($mailto) {
            $m->to($mailto)->subject('PROJECT_X Provide Assistance Not Approved');
        });
        return redirect('admin_dashboard');
    }

    public function delete_token($id){
        $token = Token::where('id', $id)->first();
        $token->delete();
        return redirect('admin_dashboard');
    }

    public function add_country($name){
        //Add country
        $c = Country::where('name', $name)->first();
        if(!$c)
        {
            $c = new Country;
            $c->name = $name;
            $c->save();
        }
        return redirect('admin_dashboard');
    }

    public function add_university($name){
        //Add university
        $u = University::where('name', $name)->first();
        if(!$u)
        {
            $u = new University;
            $u->name = $name;
            $u->save();
        }
        return redirect('admin_dashboard');
    }

    public function add_course($name, $university){
        //Add course
        $c = Course::where('name', $name)->where('university', $university)->first();
        if(!$c)
        {
            $this->add_university($university);
            $c = new Course;
            $c->name = $name;
            $c->university = $university;
            $c->save();
        }
        return redirect('admin_dashboard');
    }

    public function add_subject($name, $course, $university){
        //Add subject
        $s = Subject::where('name', $name)->where('course', $course)->where('university', $university)->first();
        if(!$s)
        {
            $this->add_university($university);
            $this->add_course($course, $university);
            $s = new Subject;
            $s->name = $name;
            $s->course = $course;
            $s->university = $university;
            $s->save();
        }
        return redirect('admin_dashboard');
    }

    public function autocomplete_assign_tutor(Request $request){
        $term = $request->input('term');
        $data = DB::table("provide_assistances")->distinct()->select("email")->where("email", "LIKE", $term."%")->orWhere("name", "LIKE", $term."%")->orWhere("subject", "LIKE", $term."%")->groupBy("created_at")->take(5)->get();
        if($data)
        {
            foreach ($data as $value) {
            $return_array[] = array("value" => $value->email);
            }
        }
        return \Response::json($return_array);
    }
}
