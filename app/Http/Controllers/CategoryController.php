<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::all();

        return view('category.index')->with('category',$category);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('category.create');
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
        $category = new Category;

        $validate = $request->validate(['name']);

        if ($validate) 
        {
           $category->name = $request->name;

           if ($category->save()) 
           {
              return response()->json(['status_code'=>201]);
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
        $category = Category::findOrFail($id);

        return view('category.edit')->with('category',$category);
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
        $validate = $request->validate(['name'=>'required']);

        if ($validate) 
        {
            $category = Category::where('id',$id)->first()->update(['name'=>$request->name]);
            if ($category) 
            {
                return response()->json(['status_code'=>200]);
            }
            else
            {
                return response()->json(['status_code'=>500]);
            }
        }
        else
        {
            return response()->jsoon(['status_code'=>300]);
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
        $category = Category::findOrFail($id);

        if ($category->delete()) 
        {
            return response()->json(['status_code'=>200]);
        }
        else
        {
            return response()->json(['status_code'=>500]);
        }
    }
}
