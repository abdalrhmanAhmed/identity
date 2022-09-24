<?php

namespace Database\Seeders;

use App\Models\record\Religion;
use Illuminate\Database\Seeder;

class religionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religions = [
            'مسلم',
            'مسيحي',
            'غير ذلك'
        ];

        foreach($religions as $religion){
            Religion::create(['religion_name' => $religion]);
        }
    }
}
