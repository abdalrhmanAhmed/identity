<?php

namespace Database\Seeders;

use App\Models\record\Popularadministrations;
use Illuminate\Database\Seeder;

class popularAdministrationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $populars = [
            'حي المطار',
            'خليوة',
            'القدواب',
            'الشمالي',
            'الشرقي',
        ];
        foreach ($populars as $permission) {
            Popularadministrations::create(['popular_name' => $permission]);
            }

    }
}
