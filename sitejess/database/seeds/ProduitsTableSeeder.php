<?php

use App\Produit;

use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0;$i<30;$i++){
           Produit::create([
               'title'=> $faker->sentence(4),
               'slug'=>$faker->slug,
               'subtitle'=>$faker->sentence(3),
               'description'=>$faker->text,
               'image'=> 'https://via.placeholder.com/200x261',
               'price'=> $faker->numberBetween(15,300) * 100,
           ]);
        }
    }
}
