<?php

namespace App\Models\record;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\record\town;
use App\Models\record\center;


class locale extends Model
{
    use HasFactory;
    protected $table = 'locales';
    public $timestamps = true;
    protected $fillable = array('id','local_name');

    public function towns(){
        return $this->belongsTo(town::class,'locae_id','id');
    }
    public function center(){
        return $this->belongsTo(Center::class,'locae_id','id');
    }
}
