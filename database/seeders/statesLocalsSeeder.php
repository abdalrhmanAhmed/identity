<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class statesLocalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locals = array(
            array('local_name' => 'محلية الدامر', 'state_id' => '10'),
            array('local_name' => 'محلية عطبرة', 'state_id' => '10'),
            array('local_name' => 'محلية شندي', 'state_id' => '10'),
            array('local_name' => 'محلية بربر', 'state_id' => '10'),
            array('local_name' => 'محلية المتمة', 'state_id' => '10'),
            array('local_name' => 'محلية أبوحمد', 'state_id' => '10'),
            array('local_name' => 'محلية البحيرة', 'state_id' => '10'),
            array('local_name' => 'محلية الخرطوم', 'state_id' => '1'),
            array('local_name' => 'محلية بحري', 'state_id' => '1'),
            array('local_name' => 'محلية  أم درمان', 'state_id' => '1'),
            array('local_name' => 'محلية أم دوم', 'state_id' => '1'),
            array('local_name' => 'محلية العيلفون', 'state_id' => '1'),
            array('local_name' => 'محلية واوسي', 'state_id' => '1'),
            array('local_name' => 'محلية الجيلي', 'state_id' => '1'),
        );
        DB::table('locales')->insert($locals);
    }
}
