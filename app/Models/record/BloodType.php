<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{

    protected $table = 'blood_type';
    public $timestamps = true;
    protected $fillable = array('name');

}
