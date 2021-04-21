<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    //

    protected $table = "application_status";

    protected $fillable = ['name'];

   public function application()
   {
   		return $this->hasMany(Application::class);
   }

}
