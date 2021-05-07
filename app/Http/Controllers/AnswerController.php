<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Options;

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
        $question = Question::all();

        return view('answer.create')->with('question',$question);
    }

    public function getOptions(Request $request)
    {
        $options = Options::where('question_id',$request->id)->get();

        return response()->json(
                            [
                              'response_code'=>200,
                              'response_data'=>$options
                            ]);
    }

    public function single($id)
    {
      $answer = Answer::findOrFail($id);

      return view('single')->with('answer',$answer);
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
        // $validate = $request->validate(
        //                         [
        //                             'question_id'=>'required',
        //                             'answer'=>'required',
        //                             'explanation'=>'required'
        //                         ]);

        // if ($validate) 
        // {
            $answer = new Answer;

            $answer->question_id = $request->question_id;
            $answer->answer = $request->answer;
            $answer->explanation = $request->explanation;

            if ($answer->save()) 
            {
                return response()->json(
                                    [
                                        'response_code'=>201,
                                        'response_message'=>'Successfull'
                                    ]);
            }
            else
            {
                return response()->json(
                                    [
                                        'response_code'=>500,
                                        'response_message'=>'Answer Not Saved'
                                    ]);
            }

        // }
        // else
        // {
        //     return response()->json(
        //                         [
        //                             'response_code'=>300,
        //                             'response_message'=>'Invalid Request'
        //                         ]);
        // }

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
        $answer = Answer::findOrFail($id);
        $question = Question::all();
        $option = Options::all();

        return view('answer.show')->with('answer',$answer)
                                  ->with('question',$question)
                                  ->with('option',$option);
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
        $question = Question::all();
        $option = Options::all();

        return view('answer.edit')->with('answer',$answer)
                                  ->with('question',$question)
                                  ->with('option',$option);
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
        $validate = $request->validate(
                                [
                                    'question_id'=>'required',
                                    'answer'=>'required',
                                    'explanation'=>'required'
                                ]);
        if ($validate) 
        {
            $answer = Answer::where('id',$id)
                              ->first()
                              ->update([
                                    'question_id'=>$request->question_id,
                                    'answer'=>$request->answer,
                                    'explanation'=>$request->explanation
                                ]);
            if ($answer) 
            {
                return response()->json(
                                    [
                                        'response_code'=>200,
                                        'response_message'=>'Succesfull'
                                    ]);
            }
            else
            {
                return response()->json(
                                    [
                                        'response_code'=>500,
                                        'response_message'=>'Answer Not Updated'
                                    ]);
            }
        }
        else
        {
            return response()->json(
                                [
                                    'response_code'=>300,
                                    'response_message'=>'Invalid Request'
                                ]);
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
        $answer = Answer::findOrFail($id);

        if ($answer->delete()) 
        {
            return response()->json(
                                [
                                    'response_code'=>200,
                                    'response_message'=>'Succesfull'
                                ]);
        }
        else
        {
            return response()->json(
                                [
                                    'response_code'=>500,
                                    'response_message'=>'Answer Not Found/Deleted'
                                ]);
        }
    }
}
