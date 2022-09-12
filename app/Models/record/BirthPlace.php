<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Model;

class BirthPlace extends Model
{

    protected $table = 'birth_place';
    public $timestamps = true;
    protected $fillable = array('birth_palce_name', 'state', 'locality', 'adminstrative_unit');

}
