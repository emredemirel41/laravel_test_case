<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'first_name' => fake()->firstName(),
        'last_name'  => fake()->lastName(),
        'birthday' => fake()->dateTimeBetween('-50 years','-20 years'),
        'biography' => fake()->text(250),
        'gender' => fake()->randomElement(['male', 'female']),
        'place_of_birth' => fake()->city().'/'.fake()->country(),
        ];
    }
}
