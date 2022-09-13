<?php


namespace App\Models\record;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\record\locale;


class center extends Model
{
    use HasFactory;
    protected $table = 'centers';
    public $timestamps = true;
    protected $fillable = array('id','center_name','local_id');

    public function local(){
        return $this->hasMany(locale::class,'id','local_id');
    }
}
