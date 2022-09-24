<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(permissionTabelSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(sudanStatesSeeder::class);
        $this->call(statesLocalsSeeder::class);
        $this->call(statesLocalsSeeder::class);
        $this->call(BloodTableSeeder::class);
        $this->call(administrativeUnitsSeeder::class);
        $this->call(popularAdministrationsSeeder::class);
        $this->call(UserDataSeeder::class);
        $this->call(socialSituationSeeder::class);
        $this->call(centerSeeder::class);
        $this->call(qualificationSeeder::class);
        $this->call(occupationalClassificationSeeder::class);
        $this->call(professionsSeeder::class);
        $this->call(banksSeeder::class);
        $this->call(religionSeeder::class);
    }
}
