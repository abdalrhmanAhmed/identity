<?php

namespace Database\Seeders;

use App\Models\record\Social_situation;
use Illuminate\Database\Seeder;

class socialSituationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $social = [
            'متزوج',
            'غير متزوج'
        ];

        foreach($social as $soc){
            Social_situation::create(['s_name' => $soc]);
        }
    }
}
