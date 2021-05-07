<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $table = "answer";

    protected $fillable = ['question_id','answer','explanation'];

    public function question()
    {
    	return $this->belongsTo(Question::class,'question_id','id');
    }

}
