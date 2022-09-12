<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Model;

class Social_situation extends Model
{

    protected $table = 'social_situation';
    public $timestamps = true;
    protected $fillable = array('s_name');

}
