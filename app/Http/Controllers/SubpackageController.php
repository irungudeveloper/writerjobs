<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subpackage;

class SubpackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $package = Subpackage::all();
        
        return view('package.index')->with('package',$package);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('package.create');
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
                                    'title'=>'required',
                                    'description'=>'required',
                                    'amount'=>'required',
                                ]);

        if ($validate) 
        {
            $package = new Subpackage;
            
            $package->title = $request->title;
            $package->description = $request->description;
            $package->amount = $request->amount;

            if ($package->save()) 
            {
                return json_encode(array(['response_code'=>200]));
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
        $package = Subpackage::findOrFail($id);

        return view('package.edit')->with('package',$package);
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
        $package = Subpackage::where('id',$request->id)
                                ->update([
                                            'title'=>$request->title,
                                            'description'=>$request->description,
                                            'amount'=>$request->amount,
                                        ]);
        if ($package) 
        {
            return json_encode(array(['response_code'=>201]));
        }
        else
        {
            return json_encode(array(['response_code'=>500]));
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
        $package = Subpackage::findOrFail($id);

        if ($package->delete()) 
        {
           return json_encode(array(['response_code'=>201]));
        }
        else
        {
            return json_encode(array(['response_code'=>500]));
        }
    }
}
