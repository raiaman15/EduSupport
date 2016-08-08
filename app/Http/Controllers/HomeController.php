<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use Validator;
use App\User;
use App\Token;
use App\Seek_assistance;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {
        if (Auth::check()) {
            return view('pages.home');
        }
        else
            return view('pages.welcome');
    }

    public function add_more_info(Request $request)
    {
        if (Auth::check()) {
            $user = User::where('email', Auth::user()->email)->first();
            if(!empty($request->DOB)){$user->DOB = $request->DOB;}
            if(!empty($request->country)){$user->country = $request->country;}
            if(!empty($request->contact)){$user->contact = $request->contact;}
            if(!empty($request->university)){$user->university = $request->university;}
            if(!empty($request->course)){$user->course = $request->course;}
            if(!empty($request->referred_by)){$user->referred_by = $request->referred_by;}
            $user->save();
            return redirect('/home');
        }
        else
            return view('pages.welcome');
    }

    /**
     * Get a validator for an incoming contact send mail request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator_send_mail(array $data)
    {
        return Validator::make($data, [
            'new_token_description' => 'required|min:50|max:1000',
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    public function contact_send_mail(Request $request)
    {
        if (Auth::check()) {
            $validator = $this->validator_send_mail($request->all());
            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );
            }
            //saving the message in DB
            $token = new Token;
            $token->name=Auth::user()->name;
            $token->email=Auth::user()->email;
            $token->description=$request->input('new_token_description');
            $token->save();
            
            return redirect('/home');
        }
        else
            return view('pages.welcome');
    }

    protected function validator_seek_assistance(array $data)
    {
        return Validator::make($data, [
            'assistance_subject' => 'required',
            'assistance_description' => 'required|min:10|max:1000',
            'assistance_document.*' => 'mimes:pdf,vnd.openxmlformats-officedocument.wordprocessingml.document,msword,jpeg,png|max:5000',
        ],
        [
            'assistance_subject.required' => 'Subject and subject codes are required',
            'assistance_description.required' => 'Assistance description is required',
            'assistance_description.min' => 'Assistance description should be more than 10 charecters',
            'assistance_description.max' => 'Assistance description should be less than 1000 charecters',
            'assistance_document.*.mimes' => 'File format not supported, use only pdf/doc/docx/jpg/png files',
            'assistance_document.*.mimes' => 'File size must be less than 5 MB.',
        ]);
    }

    public function seek_assistance(Request $request)
    {
        $files = $request->file('assistance_document');
        if(count($files)>5) //MAX 5 file upload
            {return \Response::json(array('success' => false , 'message' => "Too many files. Maximum 5 files allowed."));}
        $validator = $this->validator_seek_assistance($request->all());
        if ($validator->fails()) {
            return \Response::json(array('success' => false , 'message' => $validator->messages()->toJson()));
        }
        $seek = new Seek_assistance;
        $seek->name=Auth::user()->name;
        $seek->email=Auth::user()->email;
        $seek->subject=$request->input('assistance_subject');
        $seek->description=$request->input('assistance_description');
        $seek->file_count=count($files);
        $seek->country=Auth::user()->country;
        $seek->university=Auth::user()->university;
        $seek->course=Auth::user()->course;
        $seek->save();
        $seek1 = Seek_assistance::where('email', Auth::user()->email)->get()->last();
        if(!empty($files)):
            $count=0;
            foreach($files as $file):
                $count++;
                Storage::put($seek1->id.$count.'.'.$file->guessClientExtension(), file_get_contents($file));
            endforeach;
        endif;
        
        return \Response::json(array('success' => true , 'message' => "Request is successfully submitted. Pay the service fee to start recieving assistance."));
    }
}
