<?php

namespace Database\Seeders;

use App\Models\record\falids_jobs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class occupationalClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('falids_jobs')->delete();

        $bgs = [
            'مهندس',
            'طبيب'
        ];

        foreach($bgs as  $bg){
            falids_jobs::create(['name' => $bg]);
        }
    }
}
