<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    //
    protected $table = "assignjob";

    protected $fillable = ['job_id','user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function job()
    {
    	return $this->belongsTo(WriterJobs::class);
    }
}
