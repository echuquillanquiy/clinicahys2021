<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lot' => $this->faker->randomNumber(8),
            'brand' => $this->faker->word(),
            'status' => $this->faker->randomElement(['VIGENTE', 'CADUCADO'])
        ];
    }
}
