<?php

namespace App\Imports;

use App\Models\record\ClientDna;
use Maatwebsite\Excel\Concerns\ToModel;

class DnaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ClientDna([
            'D3S1358' => $row[1],
            'VWA' => $row[2],
            // 'FGA' => $row[3],
            // 'D8S1179' => $row[4],
            // 'D21S11' => $row[5],
            // 'D18S51' => $row[6],
            // 'D5S818' => $row[7],
            // 'D13S317' => $row[8],
            // 'D7S820' => $row[9],
            // 'D16S539' => $row[10],
            // 'THO1' => $row[11],
            // 'TPOX' => $row[12],
            // 'CSF1PO' => $row[12]
        ]);
    }
}
