<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //

    protected $table = "answer";

    protected $fillable = [
    						'question',
    						'image',
    						'price',
    						'answer'
    					];

   	public function category()
   	{
   		return $this->belongsToMany(Category::class);
   	}
}