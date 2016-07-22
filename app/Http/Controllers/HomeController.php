<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
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
            return view('pages.home')->with('user', Auth::user());;
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
}
