<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    //
    protected $table = "options";
    protected $fillable = ['option_a','option_b', 'option_c', 'option_d','question_id'];

   
    public function question()
    {
    	return $this->belongsTo(Question::class,'id','question_id');
    }
}
