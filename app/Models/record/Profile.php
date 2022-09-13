<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\record\Ticket;
use App\Models\User;


class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    public $timestamps = true;
    protected $fillable = array('client_name','client_phone','client_id','user_id','status','payed','tiket_id','created_at');
    
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function ticket(){
        return $this->belongsTo(Ticket::class,'ticket_id','tiket_id');
    }
}
