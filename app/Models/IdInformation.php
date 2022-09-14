<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdInformation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function personal_information(){
        return $this->hasOne(PersonalInformation::class, 'trak_id', 'trak_id');
    }
}
