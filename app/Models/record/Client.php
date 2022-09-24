<?php

namespace App\Models\record;

use App\Models\PersonalInformation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    public $timestamps = true;
    protected $guarded = [];

    public function personalinfo(){
        return $this->belongsTo(PersonalInformation::class,'personal_information','id');
    }
}
