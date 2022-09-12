<?php

namespace Database\Seeders;

use App\Models\record\AdministrativeUnits;
use Illuminate\Database\Seeder;

class administrativeUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminstrative = [
            'شمال عطبرة',
            'جنوب عطبرة',
            'شمال بربر',
            'جنوب بربر',
        ];
        foreach($adminstrative as  $adm){
            AdministrativeUnits::create(['Name' => $adm]);
        }
    }
}
