<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAcount extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = array('bank_acount_number ','bank_name');
}
