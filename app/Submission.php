<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    //

	protected $table = "submission";

	protected $fillable = [
							'user_id',
							'job_id',
							'status_id',
							'submission_file'
						];

	public function user()
	{
		return $this-belongsTo(User::class);
	}

	public function job()
	{
		return $this->belongsTo(WriterJobs::class);
	}

	public function status()
	{
		return $this->belongsTo(SubmissionStatus::class);
	}

}
