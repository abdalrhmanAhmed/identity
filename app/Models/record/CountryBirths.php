<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Model;

class CountryBirths extends Model
{

    protected $table = 'country_births';
    public $timestamps = true;
    protected $fillable = array('c_name','s_key');

}
