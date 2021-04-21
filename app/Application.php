<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $table = "application";

    protected $fillable = ['user_id','job_id','status_id'];


    public function job()
    {
    	return $this->belongsTo(WriterJobs::class);
    }
    
    public function status()
    {
    	return $this->belongsTo(ApplicationStatus::class);
    }

}
