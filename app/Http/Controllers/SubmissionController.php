<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;
use App\Application;
use Auth;
use Session;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo "Submitted";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $application = Application::where([
                                            ['user_id','=',Auth::user()->id],
                                            ['status_id','=',2],
                                        ])->get();
        if ($application != null) 
        {
            return view('submission.create')->with('application',$application);
        }
        else
        {
            echo "You got no job assigned";
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // echo "Storage";
        //
        $submit = new Submission;

        $validate = $request->validate([

                                    'job'=>'required',
                                    'document'=>'required',
                            ]);
        if ($validate) 
        {
            $document_name = time().'.'.$request->document->extension();

            $submit->job_id = $request->job;
            $submit->user_id = Auth::user()->id;
            $submit->submission_file = $document_name;
            $submit->status_id = 1;

            $request->document->move(public_path('submission'),$document_name);

            if ($submit->save()) 
            {
                Session::flash('message','Upload Successfully.');
                Session::flash('alert-class', 'alert-success');
                return redirect()->route('submit.create');
            }
            else
            {
                Session::flash('message','Upload Not Successful.');
                Session::flash('alert-class', 'alert-danger');
                return redirect()->route('submit.create');
            }

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
