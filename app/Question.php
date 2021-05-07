<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = "question";
    protected $fillable = ['question'];

    public function answer()
    {
    	return $this->hasOne(Answer::class,'question_id','id');
    }

    public function option()
    {
    	return $this->hasMany(Options::class,'question_id','id');
    }

     
}
