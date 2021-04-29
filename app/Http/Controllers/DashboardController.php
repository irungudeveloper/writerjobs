<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Category;
use App\Subscription;

class DashboardController extends Controller
{
    //

    public function landing()
    {
    	$answer = Answer::all();
    	$category = Category::all();
    	$sub = Subscription::all();

    	return view('welcome')->with('answer',$answer)
    						  ->with('category',$category)
    						  ->with('sub',$sub);
    }
}
