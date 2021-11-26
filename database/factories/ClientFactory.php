<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ruc' => $this->faker->creditCardNumber(),
            'name' => $this->faker->word(),
            'address' => $this->faker->address()
        ];
    }
}
