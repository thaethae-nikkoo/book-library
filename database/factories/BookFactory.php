<?php

namespace Database\Factories;

use App\Models\Author;
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
    public function definition(): array
    {
        return [
        'name' => fake()->word(),
        'description' => fake()->paragraph(),
        'cover' => 'covers/1711692337-1003w-Ah-do4Y91lk.webp',
        'author_id' => Author::factory(),
        'type' => 'Magazine',
        'rental_fee' => 1500,
        'status' => 'available',
        ];
    }
}
