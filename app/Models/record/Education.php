<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    protected $table = 'education';
    public $timestamps = true;
    protected $fillable = array('name');

}
