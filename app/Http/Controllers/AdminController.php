<?php

namespace App\Http\Controllers;

use Auth;
use App\Token;
use App\Seek_assistance;
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
            $seek_assistances = Seek_assistance::paginate(5);
            return view("pages.admin_dashboard")->with('tokens',$tokens)->with('seek_assistances',$seek_assistances);
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
