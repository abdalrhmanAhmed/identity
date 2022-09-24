<?php

namespace Database\Seeders;

use App\Models\record\BankName;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class banksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank_name')->delete();

        $bgs = [
            'بنك فيصل',
            'بنك الخرطوم'
        ];

        foreach($bgs as  $bg){
            BankName::create(['b_name' => $bg]);
        }
    }
}
