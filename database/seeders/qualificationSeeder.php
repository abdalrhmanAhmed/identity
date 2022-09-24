<?php

namespace Database\Seeders;

use App\Models\record\Education;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class qualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('education')->delete();

        $bgs = [
            'جامعي',
            'ثانوي'
        ];

        foreach($bgs as  $bg){
            Education::create(['name' => $bg]);
        }
    }
}
