<?php

namespace App\Models\record;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\record\States;
use App\Models\record\locale;
use App\Models\record\center;
// use App\Models\record\Ticket;


class UserData extends Model
{
    use HasFactory;
    protected $table = 'user_data';
    public $timestamps = true;
    protected $fillable = array('id','state','locale','center','profile_id');

    

    public function states(){
        return $this->hasMany(States::class,'id','state');
    }

    public function local(){
        return $this->hasMany(locale::class,'id','locale');
    }
    public function centers(){
        return $this->hasMany(center::class,'id','center');
    }
    // public function profile(){
    //     return $this->hasMany(locale::class,'id','locale');
    // }
}
