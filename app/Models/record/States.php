<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\record\town;
use App\Models\record\locale;


class States extends Model
{
    use HasFactory;
    protected $table = 'states';
    public $timestamps = true;
    protected $guarded = [];

    public function towns(){
        return $this->belongsTo(town::class,'stats_id','id');
    }

    public function loacles(){
        return $this->hasOne(locale::class, 'id', 'state_id');
    }
}
