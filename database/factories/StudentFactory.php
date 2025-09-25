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
            //
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'last_name' => fake()->lastName(),

            'course' => fake()->randomElement(['BSIT', 'BSCS', 'WADT', 'ACT']),
            'year_level' => fake()->randomElement(['1st Year', '2nd Year', '3rd Year', '4th Year']),
            'section' => fake()->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G']),
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            
            'date_of_birth' => fake()->date(),
            'address' => fake()->address(),

            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
        ];
    }
}
