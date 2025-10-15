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
            // Generate an 11-digit numeric ID (as a string)
            'id' => str_pad((string) random_int(0, 99999999999), 11, '0', STR_PAD_LEFT),

            // Basic identity info
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'last_name' => fake()->lastName(),

            // Academic details
            'course' => fake()->randomElement(['BSIT', 'BSCS', 'WADT', 'ACT']),
            'year_level' => fake()->randomElement(['1st Year', '2nd Year', '3rd Year', '4th Year']),
            'section' => fake()->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G']),

            // Personal info
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'date_of_birth' => fake()->date(),

            // Contact info
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
