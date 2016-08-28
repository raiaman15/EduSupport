<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Mail;
use Validator;
use Storage;
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
        $this->middleware('CheckAdmin');
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

            $tokens = Token::paginate(10);
            $seek_assistances = Seek_assistance::where('payment_link_prepared', false)
                                    ->orWhere(function ($query) {
                                            $query
                                            ->where('payment_done', true)
                                            ->where('tutor_assigned', false);
                                        })
                                    ->orWhere(function ($query) {
                                            $query
                                            ->where('feedback_provided', true)
                                            ->where('tutor_payment_generated', false);
                                        })
                                    ->orWhere(function ($query) {
                                            $query
                                            ->where('tutor_payment_generated', true)
                                            ->where('tutor_got_payment', false);
                                        })
                                    ->orderBy('updated_at', 'desc')
                                    ->paginate(1);

            $seek_assistances_count = Seek_assistance::where('payment_link_prepared', false)
                                        ->orWhere(function ($query) {
                                                $query
                                                ->where('payment_done', true)
                                                ->where('tutor_assigned', false);
                                            })
                                        ->orWhere(function ($query) {
                                                $query
                                                ->where('feedback_provided', true)
                                                ->where('tutor_payment_generated', false);
                                            })
                                        ->orWhere(function ($query) {
                                                $query
                                                ->where('tutor_payment_generated', true)
                                                ->where('tutor_got_payment', false);
                                            })
                                        ->orderBy('updated_at', 'desc')
                                        ->count();

            $provide_assistances = Provide_assistance::where('admin_approved', false)
                                        ->orderBy('updated_at', 'desc')
                                        ->paginate(10);

            $provide_assistances_count = Provide_assistance::where('admin_approved', false)
                                            ->orderBy('updated_at', 'desc')
                                            ->count();

            $subject_syllabus = Subject::where('syllabus', "")
                                    ->paginate(1);

            $subject_syllabus_count = Subject::where('syllabus', "")
                                        ->count();

            return view("pages.admin_dashboard")
                        ->with('tokens',$tokens)
                        ->with('seek_assistances',$seek_assistances)
                        ->with('provide_assistances',$provide_assistances)
                        ->with('subject_syllabus',$subject_syllabus)
                        ->with('learner_notification_count', $seek_assistances_count)
                        ->with('facilitator_notification_count', $provide_assistances_count)
                        ->with('subject_syllabus_count',$subject_syllabus_count);
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
        $provide_assistance = Provide_assistance::where('email', $tutor_email)
                                ->where('university', $seek_assistance->university)
                                ->where('course', $seek_assistance->course)
                                ->where('subject', $seek_assistance->subject)
                                ->first();
        if(!$provide_assistance)
        {
            dd("INVALID EMAIL ID");
        }
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
        $this->add_subject($provide_assistance->subject, $provide_assistance->course, $provide_assistance->university);
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
            $m->to($mailto)->subject( config('app.app_name').': Provide Assistance Not Approved' );
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
            $c->name = strtoupper($name);
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
            $u->name = strtoupper($name);
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
            $c->name = strtoupper($name);
            $c->university = strtoupper($university);
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
            $s->name = strtoupper($name);
            $s->course = strtoupper($course);
            $s->university = strtoupper($university);
            $s->save();
        }
        return redirect('admin_dashboard');
    }

    protected function validator_add_subject_syllabus(array $data)
    {
        return Validator::make($data, [
            'subject_id' => 'required',
            'subject_syllabus' => 'required|mimes:pdf,docx,doc,jpeg,png|max:5000',
        ],
        [
            'subject_id.required' => 'Subject ID not provided',
            'subject_syllabus.required' => 'Resume and Highest degree cetificate is mandatory. Please upload them.',
            'subject_syllabus.mimes' => 'File format not supported, use only pdf/doc/docx/jpg/png files.',
            'subject_syllabus.max' => 'File size must be less than 5 MB.',
        ]);
    }

    public function add_subject_syllabus(Request $request){
        //Add subject syllabus
        $validator = $this->validator_add_subject_syllabus($request->all());
        if ($validator->fails()) {
            return \Response::json(array('success' => false , 'message' => $validator->messages()->toJson()));
        }
        $id = $request->input('subject_id');
        $subject = Subject::where('id', $id)->first();
        $document = $request->file('subject_syllabus');
        if((!empty($document))&&(!is_null($document)))
        {
            $subject->syllabus = 'syllabus_'.($subject->id).'.'.$document->guessClientExtension();
            Storage::delete($subject->syllabus);
            Storage::put($subject->syllabus, file_get_contents($document));
            $subject->save();
            return \Response::json(array('success' => true , 'message' => "Successfully uploaded syllabus."));
        }
        return \Response::json(array('success' => false , 'message' => "Failed to uploaded syllabus."));
    }

    public function autocomplete_assign_tutor($id, Request $request){
        $seek_assistance = Seek_assistance::where('id', $id)->first();
        $term = $request->input('term');
        $data = DB::table("provide_assistances")
                    ->distinct()
                    ->select("email")
                    ->where('university', $seek_assistance->university)
                    ->where('course', $seek_assistance->course)
                    ->where('subject', $seek_assistance->subject)
                    ->where("subject", "LIKE", $term."%")
                    ->groupBy("created_at")
                    ->take(5)->get();
        if($data)
        {
            foreach ($data as $value) {
            $return_array[] = array("value" => $value->email);
            }
        }
        return \Response::json($return_array);
    }
}
