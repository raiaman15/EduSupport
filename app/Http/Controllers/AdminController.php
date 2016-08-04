<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

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
            return view('pages.admin_dashboard');
        }
        else
            return view('pages.welcome');
    }

    public function messege()
    {
        if (Auth::check()) {
            return view('pages.admin_dashboard');
        }
        else
            return view('pages.welcome');
    }

}
