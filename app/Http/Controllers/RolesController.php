<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Roles::all();
        return view('roles.index')->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('roles.create');

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
        $validator = $request->validate(['name'=>'required']);

        if ($validator) 
        {
            $role = new Roles;

            $role->name = $request->name;

            if ($role->save()) 
            {
                return json_encode(array(
                    [
                        'response_code'=>201,
                        'response_message'=>'Role Created',
                    ]));
            }
            else
            {
                return json_encode(array(
                    [
                       'response_code'=>500,
                        'response_message'=>'Role Not Created', 
                     ]));
            }
        }
        else
        {
            return json_encode(array(
                [
                    'response_code'=>300,
                    'response_message'=>'Invalid Input! Please Try Again',      
                ]));
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

        $roles = Roles::findOrFail($id);

        return view('roles.edit')->with('roles',$roles);
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

        $validator = $request->validate(['name'=>'required',]);

        if ($validator) 
        {
            $roles = Roles::where('id',$request->id)
                            ->update(['name'=>$request->name]);
            if ($roles) 
            {
                return json_encode(array(
                    [
                        'response_code'=>200,
                        'response_message'=>'Roles Updated',
                    ]));
            }
            else
            {
                return json_encode(array(
                    [
                        'response_code'=>500,
                        'response_message'=>'Role Not Updated',
                    ]));
            }
        }
        else
        {
            return json_encode(array(
                [
                    'response_code'=>300,
                    'response_message'=>'Invalid Input! Please Try Again',
                ]));
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
        $roles = Roles::findOrFail($id);

       if ($roles->delete()) 
        {
            return redirect()->route('roles.index');
        }

    }
}
