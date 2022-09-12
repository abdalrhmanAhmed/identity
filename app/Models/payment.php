<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'sno',
        'uuid',
        'register',
        'cards',
        'study',
        'degree',
        'statement',
        'arrears',
        'ather',
        'user_id',
        's_name',
        'created_at',
    ];
}
