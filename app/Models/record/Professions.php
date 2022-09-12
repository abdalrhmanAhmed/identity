<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Model;

class Professions extends Model
{

    protected $table = 'professions';
    public $timestamps = true;
    protected $fillable = array('name');

}
