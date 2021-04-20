<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WriterJobs;

class WriterJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = WriterJobs::all();

        return view('jobs.index')->with('jobs',$jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jobs.create');
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

        $job = new WriterJobs;

        if ($request->image !=null) 
        {
            $validator = $request->validate(
                        [
                            'image'=>'image|mimes:jpeg,png,jpg|max:2048',
                            'title'=>'required',
                            'description'=>'required',
                            'amount' => 'required',
                            'deadline' => 'required',
                         ]);

            if ($validator) 
            {
                $image_name = time().'.'.$request->image->extension();

                $job->title = $request->title;
                $job->description = $request->description;
                $job->image = $image_name;
                $job->amount = $request->amount;
                $job->deadline = $request->deadline;
                 $job->status_id = 0;

                $request->image->move(public_path('images/jobs'), $image_name);

                if ($job->save()) 
                {
                    return redirect()->route('jobs.create');
                }
                else
                {
                    echo "ERROR UPLOADING";
                }

            }
        }
        else
        {
            $image_name = "placeholder_image.png";

            $validator = $request->validate(
                        [
                            'title'=>'required',
                            'description'=>'required',
                         ]);

            if ($validator) 
            {
                $job->title = $request->title;
                $job->description = $request->description;
                $job->image = $image_name;
                $job->amount = $request->amount;
                $job->deadline = $request->deadline;
                $job->status_id = 0;

                if ($job->save()) 
                {
                    return redirect()->route('jobs.create');
                }
                else
                {
                    echo "ERROR UPLOADING";
                }

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
        $jobs = WriterJobs::findOrFail($id);

        return view('jobs.edit')->with('jobs',$jobs);
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

        // echo "REACHED";
        //
        if ($request->image == null) 
        {
            $image_name = "placeholder_image.png";
        }
        else
        {
            $image_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/jobs'), $image_name);

        }

            $jobs = WriterJobs::where('id',$request->id)
                                    ->first()
                                    ->update([
                                                'image'=>$image_name,   
                                                'title'=>$request->title,
                                                'description'=>$request->description,
                                                'amount'=>$request->amount,
                                                'deadline'=>$request->deadline,
                                                ]);

            if ($jobs) 
            {
                return redirect()->route('jobs.index');
            }
            else
            {
                echo "ERROR UPDATING";
            }
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
        $jobs = WriterJobs::findOrFail($id);

        if ($jobs->delete()) 
        {
            return redirect()->route('jobs.index');
        }
        else
        {
            echo "ERROR IN DELETION";
        }

    }
}
