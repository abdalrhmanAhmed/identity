<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\record\UserData;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = UserData::create([
            'state' => 1,
            'locale' => 1,
            'password' => 1,
            'profile_id' => 1
        ]);
    }
}
