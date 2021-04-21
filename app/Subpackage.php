<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subpackage extends Model
{
    //
    protected $table = "subscription_package";

    protected $fillable = ['title','description','amount'];
}
