<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $table = "category";

    protected $fillable = ['name'];

    public function answer()
    {
    	return $this->belongsToMany(Answer::class);
    }
}
