<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmissionStatus extends Model
{
    //
    protected $table = "submission_table";

    protected $fillable = ['name'];

    public function submission()
    {
    	return $this->hasMany(Submission::class);
    }
}
