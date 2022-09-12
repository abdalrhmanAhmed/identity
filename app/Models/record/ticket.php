<?php

namespace App\Models\record;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    public $timestamps = true;
    protected $fillable = array('client_name','client_phone','client_id','user_id','status','payed','tiket_id','created_at');
    
    public function user(){
        return $this->hasMany(User::class,'id','user_id');
    }
}

