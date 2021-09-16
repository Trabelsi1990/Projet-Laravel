<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Seeder;

class ClasseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classe::create([
            'nom_classe'=>'guerrier',  
        ]);
        Classe::create([
            'nom_classe'=>'mage',
        ]);
        Classe::create([
            'nom_classe'=>'pretre',
        ]);
        Classe::create([
            'nom_classe'=>'chasseur',
        ]); 
    }
}
