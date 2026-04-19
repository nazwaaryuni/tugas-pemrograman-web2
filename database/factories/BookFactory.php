<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'         => fake()->sentence(3),
            'author'        => fake()->name(),
            'publisher'     => fake()->company(),
            'year'          => fake()->numberBetween(2000, 2024),
            'isbn'          => fake()->numerify('#############'), 
            'stock'         => fake()->numberBetween(1, 100),
        ];
    }
}
