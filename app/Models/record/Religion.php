<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model 
{

    protected $table = 'religion';
    public $timestamps = true;
    protected $fillable = array('religion_name');

}