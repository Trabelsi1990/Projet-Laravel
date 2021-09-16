<?php

namespace Database\Seeders;

use App\Models\Classe;
use App\Models\Race;
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
        // Race::factory(1)->create();
        // Classe::factory(1)->create();
        $this->call([
            RaceTableSeeder::class,
            ClasseTableSeeder::class,
        ]);
        
    }
}
