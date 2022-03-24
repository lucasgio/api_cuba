<?php

namespace Database\Factories;

use App\Models\Municipality;
use App\Models\Provincie;
use Illuminate\Database\Eloquent\Factories\Factory;

class NeighborhoodsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->city(),
            'municipalitie_id' => Municipality::factory(),
        ];
    }
}
