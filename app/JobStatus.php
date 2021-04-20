<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    //
    protected $table = "job_status";

    protected $fillable = ['name'];

    public function jobs()
    {
    	return $this->hasMany(WriterJobs::class);
    }
}
