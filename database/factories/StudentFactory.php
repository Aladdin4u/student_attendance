<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName' => $this->faker->name(),
            'lastName' => $this->faker->name(),
            'otherName' => $this->faker->name(),
            'regNumber' => $this->faker->phoneNumber(5),
            'courseCode' => 'CRE 152',
            'level' => '400',
        ];
    }
}
