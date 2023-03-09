<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->unique()->words(3, true),
            'release_date' => fake()->dateTimeBetween('-10 years','-5 years'),
            'description' => fake()->text(250),
            'isbn' => fake()->isbn10(),
            'format' => fake()->randomElement(['Hardcover Books', 'Trade Paperbacks','Miniature Books','Photo Books']),
            'number_of_pages' => fake()->numberBetween(50,1000),
            ];
    }
}
