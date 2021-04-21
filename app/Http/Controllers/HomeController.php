<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\WriterJobs;
use App\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        if (Gate::allows('administrator')) 
        {
            // echo "ADMINISTRATOR DASHBOARD";
            $jobs = WriterJobs::count();
            $user = User::where('role_id',2)->count();

           return view('dashboard.admin_dashboard')->with('jobs',$jobs)
                                                   ->with('subs',$user);  
        }
       
        if (Gate::allows('subscriber')) 
        {
           $jobs = WriterJobs::where('status_id',1)->get();

           return view('dashboard.sub_dashboard')->with('jobs',$jobs);
        }

        // $jobs = WriterJobs::where('status_id',1)->get();

        // return view('home')->with('jobs',$jobs);
    }
}
