<?php

namespace Database\Seeders;

use App\Models\record\States;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sudanStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            'ولاية الخرطوم',
            'ولاية الجزيرة',
            'ولاية البحر الأحمر',
            'ولاية كسلا',
            'ولاية القضارف',
            'ولاية سنار',
            'ولاية النيل الأبيض',
            'ولاية النيل الأزرق',
            'الولاية الشمالية',
            'ولاية نهر النيل',
            'ولاية شمال كردفان',
            'ولاية غرب كردفان',
            'ولاية جنوب كردفان',
            'ولاية شمال دارفور',
            'ولاية غرب دارفور',
            'ولاية جنوب دارفور',
            'ولاية شرق دارفور',
            'ولاية وسط دارفور',
        ];
        foreach($states as $state)
        {
            States::create(['state_name' => $state]);
        }
    }
}
