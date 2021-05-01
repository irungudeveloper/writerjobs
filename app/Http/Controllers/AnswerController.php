<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Category;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $answer = Answer::all();

        return view('answer.index')->with('answer',$answer);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();

        return view('answer.create')->with('category',$category);
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

        $answer = new Answer;

        $validate = $request->validate([
                    'question'=>'required',
                    'image'=>'required|image',
                    'price'=>'required',
                    'answer'=>'required',
                ]);

        if ($validate) 
        {
            $imageName = time().'.'.$request->image->extension();  
   
            $request->image->move(public_path('images'), $imageName); 

            $answer->question = $request->question;
            $answer->image = $imageName;
            $answer->price = $request->price;
            $answer->answer = $request->answer;

            if ($answer->save()) 
            {
               $answer->category()->attach($request->category_id);
               
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
        $answer = Answer::findOrFail($id);
        $category = Category::all();

        return view('answer.edit')->with('answer',$answer)
                                  ->with('category',$category);
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

        $validate = $request->validate([
                    'question'=>'required',
                    'image'=>'nullable',
                    'price'=>'required',
                    'answer'=>'required',
                ]);

        if ($validate) 
        {
            $imageName = time().'.'.$request->image->extension();  
   
            $request->image->move(public_path('images'), $imageName); 


            $answer = Answer::where('id',$id)
                        ->first()
                        ->update([
                                'question'=>$request->question,
                                'image'=>$request->image,
                                'price'=>$request->price,
                                'answer'=>$request->answer,
                            ]);
            if ($answer) 
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
        $answer = Answer::findOrFail($id);

        if ($answer->delete()) 
        {
            // return response()->json(['status_code'=>200]);
            return redirect()->back();
        }
        else
        {
            return response()->json(['status_code'=>500]);
        }
    }

    public function single($id)
    {
        $answer = Answer::findOrFail($id);

        return view('single')->with('answer',$answer);
    }
}
