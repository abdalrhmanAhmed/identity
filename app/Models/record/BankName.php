<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BankName extends Model
{

    use HasFactory;
    protected $table = 'bank_name';
    protected $fillable = [
        'b_name',
    ];
    public $timestamps = true;

}
