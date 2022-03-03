<?php

namespace Database\Factories;

use App\Models\Provincie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MunicipalityFactory extends Factory
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
            'provincie_id' => Provincie::factory()
        ];
    }
}
