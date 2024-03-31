<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pagesController extends Controller
{
    public function home()
    {

        $topBorrowedBooks = History::select('book_id', DB::raw('count(*) as borrow_count'))
    ->groupBy('book_id')
    ->orderByDesc('borrow_count')
    ->limit(5)
    ->get();

        $topBorrowedBookIds = $topBorrowedBooks->pluck('book_id');

        $topBorrowedBooksData = Book::whereIn('id', $topBorrowedBookIds)->get();

        $chartData = [];
        foreach ($topBorrowedBooksData as $book) {
            $borrowCount = $topBorrowedBooks->where('book_id', $book->id)->first()->borrow_count;
            $chartData[] = [
                'value' => $borrowCount,
                'name' => $book->name,
            ];
        }



        return view('dashboard', [
                    'chartData' => $chartData,

            'data' =>History::latest()->with('book')->take(5)->get(),
            'member_count' => User::all()->count(),
            'book_count' => Book::all()->count(),
            'author_count' => Author::all()->count(),
        ]);
    }

    public function login()
    {
        return view('login');

    }

}
