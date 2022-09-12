<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeUnits extends Model
{
    use HasFactory;

    protected $fillable = array('adminis_name ');

    public $timestamps = true;
}
