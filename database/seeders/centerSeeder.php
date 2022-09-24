<?php

namespace Database\Seeders;

use App\Models\record\center;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class centerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $centers = array(
            array('center_name' => 'المركز الرئيسي فرع الخرطوم', 'local_id' => '8'),
            array('center_name' => 'المركز الرئيسي فرع عطبرة', 'local_id' => '2'),
        );
        DB::table('centers')->insert($centers);
    }
}
