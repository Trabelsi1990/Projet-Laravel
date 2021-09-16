<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Race::create([
            'nom_race'=>'humain',
        ]);
        Race::create([
            'nom_race'=>'elfe',
        ]);
        Race::create([
            'nom_race'=>'nain',
        ]);
        Race::create([
            'nom_race'=>'orc',
        ]);
    }
}
