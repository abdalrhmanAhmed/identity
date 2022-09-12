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
        $this->call(UserData::class);
    }
}
