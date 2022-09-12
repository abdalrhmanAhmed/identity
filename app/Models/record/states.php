<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\record\town;


class States extends Model
{
    use HasFactory;
    protected $table = 'states';
    public $timestamps = true;
    protected $fillable = array('id','state_name');

    public function towns(){
        return $this->belongsTo(town::class,'stats_id','id');
    }
}
