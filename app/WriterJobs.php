<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WriterJobs extends Model
{
    //
    protected $table = "jobs";

    protected $fillable = ['title','description','image','amount','deadline','status_id'];

    public function status()
    {
    	return $this->belongsTo(JobStatus::class);
    }

}
