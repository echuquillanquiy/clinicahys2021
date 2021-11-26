<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dni' => $this->faker->unique()->randomNumber(8),
            'name' => $this->faker->name(),
            'lastname' => $this->faker->lastName(),
            'birthday' => Carbon::now()->subYears(30),
            'age' => $this->faker->randomNumber(3)
        ];
    }
}
