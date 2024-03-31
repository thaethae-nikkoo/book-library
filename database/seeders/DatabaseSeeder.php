<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\History;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create();
        Author::factory()->create([
            'name' => 'Author1'
        ]);
        Author::factory()->create([
            'name' => 'Author2'
        ]);
        Author::factory()->create([
            'name' => 'Author3'
        ]);
        Author::factory()->create([
            'name' => 'Author4'
        ]);
        User::factory()->create([
            'name' => 'Example User',
            'email' => 'exampleuser@gmail.com',
            'role' => 'librarian',
            'password' => Hash::make('exampleuser123@')
        ]);
        Book::factory()->create([
            'name' => 'Introduction to psychology',
            'author_id' => 1,
            'type' => 'science',
            'rental_fee' => 1000 ,
        ]);
        Book::factory()->create([
            'name' => 'Myanmar Cultural',
            'author_id' => 3,
            'type' => 'travel',
            'rental_fee' => 500 ,
        ]);
        Book::factory()->create([
            'name' => 'Mental Health',
            'author_id' => 1,
            'type' => 'motivation',
            'rental_fee' => 700 ,
        ]);
        Book::factory()->create([
            'name' => 'Wold Wars',
            'author_id' => 2,
            'type' => 'history',
            'rental_fee' => 500 ,
        ]);
        Book::factory()->create([
            'name' => 'Doraemon',
            'author_id' => 1,
            'type' => 'cartoon',
            'rental_fee' => 600,
        ]);
        Book::factory()->create([
            'name' => 'The political science encyclopedia',
            'author_id' => 3,
            'type' => 'politic',
            'rental_fee' => 700 ,
        ]);
        Book::factory()->create([
            'name' => 'King Anawrahtar',
            'author_id' => 2,
            'type' => 'history',
            'rental_fee' => 500 ,
        ]);
        Book::factory()->create([
            'name' => 'Balance the Life',
            'author_id' => 3,
            'type' => 'motivation',
            'rental_fee' => 500 ,
        ]);
        // BorrowedBook::factory()->create([
        //     'book_id' => 4,
        //     'member_id' => 3,
        //     'author_id' => 2,
        //     'date_count' => 3,
        //     'total_price' => 1500.00,
        //     'status' => 'borrowed',
        //     'due_date' => '2024-04-03',
        //     'created_at' => '2024-03-31 22:32:15',
        // ]);
        // BorrowedBook::factory()->create([
        //     'book_id' => 3,
        //     'member_id' => 2,
        //     'date_count' => 2,
        //     'status' => 'borrowed',
        //     'author_id' => 1,
        //     'total_price' => 1400,
        // ]);
        // History::factory()->create([
        //     'book_id' => 3,
        //     'member_id' => 2,
        //     'date_to' => '2024-03-31',
        //     'status' => 'borrowed',
        //     'author_id' => 1,

        // ]);
        // History::factory()->create([
        //     'book_id' => 1,
        //     'member_id' => 3,
        //     'date_to' => '2024-03-31',
        //     'status' => 'returned',
        //     'author_id' => 1,
        //      'price' => 4000,

        // ]);

    }
}
