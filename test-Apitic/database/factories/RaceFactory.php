<?php

namespace Database\Factories;

use App\Models\Race;
use Illuminate\Database\Eloquent\Factories\Factory;

class RaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Race::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'race_id'=>'0',
            'nom_race'=>'Humain',
            'created_at'=> now()
        ];
        
    }
}
