<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WriterJobs extends Model
{
    //
    protected $table = "jobs";

    protected $fillable = ['title','description','image',];
}
