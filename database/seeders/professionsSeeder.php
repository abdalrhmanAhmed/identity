<?php

namespace Database\Seeders;

use App\Models\record\Professions;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class professionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professions')->delete();

        $bgs = [
            'مبرمج',
            'طبيب عمومي'
        ];

        foreach($bgs as  $bg){
            Professions::create(['name' => $bg]);
        }
    }
}
