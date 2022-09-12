<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popularadministrations extends Model
{
    use HasFactory;
    protected $table = 'popular_administrations';
    public $timestamps = true;
    protected $fillable = array('popular_name');
}
