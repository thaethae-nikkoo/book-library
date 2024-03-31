<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BorrowedBook>
 */
class BorrowedBookFactory extends Factory
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
            'date_count' => 2,
            'total_price' => 4000,
            'status' => 'borrowed',
            'due_date' => fake()->date(),
            'borrowed_code' => fake()->numberBetween(10000000, 9999993647)
        ];
    }
}
