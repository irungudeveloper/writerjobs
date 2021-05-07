<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Options;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $question = Question::all();

        return view('question.index')->with('question',$question);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('question.create');
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

        // echo "HERE";

        // $validate = $request->validate(
        //             [
        //                 'question'=>'required',
        //                 'option_a'=>'required',
        //                 'option_b'=>'required',
        //                 'option_c'=>'required',
        //                 'option_d'=>'required',
        //                 'category'=>'required'
        //             ]);

        // if ($validate) 
        // {
            $question = new Question;
            $option = new Options;

            $question->question = $request->question;


            if ($question->save()) 
            {
                $option->option_a = $request->option_a;
                $option->option_b = $request->option_b;
                $option->option_c = $request->option_c;
                $option->option_d = $request->option_d;
                $option->question_id = $question->id;

                // $question->category()->attach([$request->category]);

                if ($option->save()) 
                {
                    // return response()->json(
                    //                     [
                    //                         'response_code'=>201,
                    //                         'response_message'=>'Successful'
                    //                     ]);
                    echo "CREATED";
                }
                else
                {
                    // return response()->json(
                    //                     [
                    //                         'response_code'=>500,
                    //                         'response_message'=>'Options not saved'
                    //                     ]);
                    echo "Options not saved";
                }
            }

            else
            {
                // return response()->json(
                //                     [
                //                         'response_code'=>500,
                //                         'response_message'=>'Question Not Saved'
                //                     ]);
                echo "Question not saved";
            }

       // }
      //  else
        //{
            // return response()->json(
            //                     [
            //                         'response_code'=>300,
            //                         'response_message'=>'Invalid request'
            //                     ]);
          //  echo "Invalid request";
        //}

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
        // $question = Question::findOrFail($id);

        // return view('question.show')->with('question',$question);
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
        $question = Question::findOrFail($id);

        return view('question.edit')->with('question',$question);
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
        // $validate = $request->validate(
        //                         [
        //                             'question'=>'required',
        //                             'option_a'=>'required',
        //                             'option_b'=>'required',
        //                             'option_c'=>'required',
        //                             'option_d'=>'required'
        //                         ]);
        // if ($validate) 
        // {
            $question = Question::where('id',$id)
                                  ->first()
                                  ->update(
                                        [
                                            'question'=>$request->question,
                                        ]);
            $option = Options::where('question_id',$id)
                                ->first()
                                ->update(
                                    [
                                        'option_a'=> $request->option_a,
                                        'option_b'=> $request->option_b,
                                        'option_c'=> $request->option_c,
                                        'option_d'=> $request->option_d
                                    ]);
            if ($question) 
            {
                if ($option) 
                {
                    // return response()->json(
                    //                     [
                    //                         'response_code'=>200,
                    //                         'response_message'=>'Succesfull'
                    //                     ]);
                    echo "SUCCESS";
                }
                else
                {
                    // return response()->json(
                    //                     [
                    //                         'response_code'=>500,
                    //                         'response_message'=>'Options Not Updated'
                    //                     ]);
                    echo "ERROR 1";
                }
            }
            else
            {
                // return response()->json(
                //                     [
                //                         'response_code'=>500,
                //                         'response_message'=>'Question Not Updated'
                //                     ]);
                echo "ERROR 2";
            }
      //  }
        // else
        // {
            // return response()->json(
            //                     [
            //                         'response_code'=>300,
            //                         'response_message'=>'Invalid Request'
            //                     ]);

        //     echo "ERROR 3";
        // }

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
        $question = Question::findOrFail($id);
        $option = Options::where('question_id',$id);

        if ($question->delete()) 
        {
            if ($option->delete()) 
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
                                        'response_message'=>'Options Not Deleted'
                                    ]);
            }
        }
        else
        {
            return response()->json(
                                [
                                    'response_code'=>500,
                                    'response_message'=>'Question Not Deleted'
                                ]);
        }
    }
}
