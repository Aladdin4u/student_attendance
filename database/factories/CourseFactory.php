<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->buildingNumber(),
            'title' => $this->faker->stateAbbr(),
            'semester' => 'First',
            'session' => '2022/2023',
            'studentId' => 1
        ];
    }
}
