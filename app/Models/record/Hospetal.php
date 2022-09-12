<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospetal extends Model
{
    use HasFactory;
    protected $table = 'hospetals';
    public $timestamps = true;
    protected $fillable = array(
        'local_id',
        'h_no',
        ' id_no',
        'b_date',
        'type',
        'files_route',
        'descrption',
    );
}
