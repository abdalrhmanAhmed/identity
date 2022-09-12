<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\record\States;
use App\Models\record\locale;

class town extends Model
{  
     use HasFactory;
    protected $table = 'towns';
    public $timestamps = true;
    protected $fillable = array('id','town_name','locae_id','stats_id');


    public function states(){
        return $this->hasMany(States::class,'id','stats_id');
    }

    public function local(){
        return $this->hasMany(locale::class,'id','locae_id');
    }
}
