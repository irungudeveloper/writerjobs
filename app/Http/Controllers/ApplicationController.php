<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Application;
use App\WriterJobs;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $application = Application::where('user_id',Auth::user()->id)->get();

         $pending = Application::where([
                                    ['user_id', '=', Auth::user()->id],
                                    ['status_id', '=', 1],
                                ])->count();

         $total = Application::where('user_id',Auth::user()->id)->count();

         $approved =  Application::where([
                                    ['user_id', '=', Auth::user()->id],
                                    ['status_id', '=', 2],
                                ])->count();

         $rejected =  Application::where([
                                    ['user_id', '=', Auth::user()->id],
                                    ['status_id', '=', 3],
                                ])->count();

    return view('application.index')->with('application',$application)
                                    ->with('pending',$pending)
                                    ->with('total',$total)
                                    ->with('approved',$approved)
                                    ->with('rejected',$rejected);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
                                'user_id'=>'required',
                                'job_id'=>'required',
                            ]);

        if ($validate) 
        {
            $application = new Application;

            $application->user_id = $request->user_id;
            $application->job_id = $request->job_id;
            $application->status_id = 1;

            if ($application->save()) 
            {
                return json_encode(array(['response_code'=>201]));
            }
            else
            {
                return json_encode(array(['response_code'=>500]));
            }
        }
        else
        {
            return json_encode(array(['response_code'=>300]));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $jobs = WriterJobs::findOrFail($id);

        return view('application.show')->with('jobs',$jobs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
