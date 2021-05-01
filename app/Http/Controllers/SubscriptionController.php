<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscription;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subscription = Subscription::all();

        return view('sub.index')->with('sub',$subscription);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sub.create');

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
        $validate = $request->validate(['name'=>'required','amount'=>'required']);

        if ($validate) 
        {
            $sub = new Subscription;
            $sub->name = $request->name;
            $sub->amount = $request->amount;

            if ($sub->save()) 
            {
                // return response()->json(['status_code'=>201]);
                return redirect()->back();
            }
            else
            {
                return response()->json(['status_code'=>500]);
            }
        }
        else
        {
            return response()->json(['status_code'=>300]);
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
        $sub = Subscription::findOrFail($id);

        return view('sub.edit')->with('sub',$sub);
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
        $validate = $request->validate(['name'=>'required','amount'=>'required']);

        if ($validate) 
        {
            $sub = Subscription::where('id',$id)->first()->update(['name'=>$request->name,'amount'=>$request->amount]);

            if ($sub) 
            {
                // return response()->json(['status_code'=>200]);
                return redirect()->back();
            }
            else
            {
                return response()->json(['status_code'=>500]);
            }
        }
        else
        {
            return response()->json(['status_code'=>300]);
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
        $sub = Subscription::findOrFail($id);

        if ($sub->delete()) 
        {
            // return response()->json(['status_code'=>200]);
            return redirect()->back();
        }
        else
        {
            return response()->json(['status_code'=>500]);
        }
    }
}
