<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WriterJobs;
use App\Application;
use App\Assign;

class AssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $application = Application::where('status_id',1)
                                    ->orderBy('job_id','ASC')
                                    ->get();

        return view('assign.index')->with('application',$application); 
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
        $assign = new Assign;

        $assign->job_id = $request->job_id;
        $assign->user_id = $request->user_id;

        if ($assign->save()) 
        {
            $job = WriterJobs::where('id',$request->job_id)
                                ->update(['status_id'=>3]);

            if ($job) 
            {
                $approve = Application::where('id',$request->app_id)
                                            ->where('user_id',$request->user_id)
                                            ->update(['status_id'=>2]);
                if ($approve) 
                {
                    $reject = Application::where('job_id',$request->job_id)
                                            ->where('user_id','!=',$request->user_id)
                                            ->orWhereNull('user_id')
                                            ->update(['status_id'=>3]);

                    return json_encode(array(['response_code'=>200]));
                }
                else
                {
                    return json_encode(array(['response_code'=>300]));
                }
            }
            else
            {
                return json_encode(array(['response_code'=>301]));
            }
        }
        else
        {
            return json_encode(array(['response_code'=>302]));
        }

        return json_encode(array(['response_code'=>303]));

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
         $application = Application::findOrFail($id);

        return view('assign.edit')->with('application',$application);
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
