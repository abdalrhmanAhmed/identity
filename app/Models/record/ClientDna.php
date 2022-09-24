<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ClientDna extends Model
{
    use HasFactory;
    protected $table = 'clients_dna';
    public $opration = 'العملية علي  ملفات الحمض النووي';

protected $fillable = [
    'D3S1358',
    'VWA',
    'FGA',
    'D8S1179',
    'D21S11',
    'D18S51',
    'D5S818',
    'D13S317',
    'D7S820',
    'D16S539',
    'THO1',
    'TPOX',
    'CSF1PO'
];  

// public function generateTags(): array
// {
//     return [
//         $this->opration,
//     ];
// }
}

