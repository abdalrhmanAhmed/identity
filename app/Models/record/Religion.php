<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model 
{

    protected $table = 'religions';
    public $timestamps = true;
    protected $fillable = array('religion_name');

}