<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Subscription;
use App\Question;

class DashboardController extends Controller
{
    //

    public function landing()
    {
    	$answer = Answer::all();
    	$sub = Subscription::all();
    	$question = Question::all();
    	$pay = 100;
    	return view('welcome')->with('answer',$answer)
    						  ->with('question',$question)
    						  ->with('sub',$sub);
    }
}
