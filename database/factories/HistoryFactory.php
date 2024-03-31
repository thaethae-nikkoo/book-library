<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\History>
 */
class HistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => 1,
           'member_id' => 2,
           'author_id' => 2,
           'status' => 'borrowed',
           'date_to' => fake()->date(),
           'price' => 4000,
           'borrowed_code' => fake()->numberBetween(10000000, 9999993647)
       ];

    }
}
