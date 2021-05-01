<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //

	public function singlepay($price,$id)
	{
		return view('payment.index')->with('price',$price)
									->with('id',$id);
	}

}
