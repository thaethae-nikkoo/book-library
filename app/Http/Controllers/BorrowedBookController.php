<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\History;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('borrowed_list', [
            'data' =>  BorrowedBook::latest()->with('book', 'user', 'author')->get()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('selectBooks', [
            'books' => Book::where('status', 'available')->with('author')->get(),
            'books_not_available' =>  Book::where('status', 'borrowed')->with('author', 'borrowedBook')->get(),
        ]);

    }

    public function choose_book(Request $request)
    {
        $request->validate([
            'books' => ['required'],
        ], [
            'books.required' => 'Choose at least one book to borrow.'
        ]);
        $selectedBooks = $request->input('books', []); // Array of checked checkboxes
        $selectedBooksJSON = json_encode($selectedBooks);

        return view('borrowForm', [
         'selectedBooks' => $selectedBooksJSON,
         'book_count'=>count($selectedBooks),
         'choosed_books' => Book::whereIn('id', $selectedBooks)->get(),
         'users' => User::all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookDetails = [];
        $borrowedBook = $request->validate([
         'member_id'=> ['required'],
         'date_count'=> ['required','integer','min:1'],
        ]);
        $history['member_id'] = $request->member_id;

        $currentDate = Carbon::now();

        // Convert date_count to an integer
        $dateCount = (int)$request->date_count;

        // Add the date_count days to the current date to get the due date

        $dueDate = $currentDate->copy()->addDays($dateCount);
        $history['date_to'] = $dueDate;

        $borrowedBook['due_date'] = $dueDate;


        $member = User::where('id', $request->member_id)->first();

        $choosedBooks = json_decode($request->input('choosed_books'), true);

        $totalpricetopay = 0;

        foreach ($choosedBooks as $bookId) {
            // Retrieve book details from the database
            $book = Book::where('id', $bookId)->with('author')->first();
            $borrowedBook['author_id'] = $book->author->id;
            $history['author_id'] = $book->author->id;
            $borrowedBook['book_id'] = $bookId;
            $history['book_id'] = $bookId;
            $borrowedBook['status'] = 'borrowed';
            $history['status'] = 'borrowed';

            // Calculate total price
            $borrowedBook['total_price']  = $book->rental_fee * $dateCount;
            $history['price'] = $borrowedBook['total_price'] ;
            $totalpricetopay += $borrowedBook['total_price'];
            // Generate borrowed code
            $borrowedBook['borrowed_code'] = rand(10000000, 9999993647);
            $history['borrowed_code'] = $borrowedBook['borrowed_code'];

            $bookDetails[] = [
                'book_name' => $book->name,
                'author_name' => $book->author->name,
                'price' => $book->rental_fee,
            ];


            // Update book status to 'borrowed'
            $book->update(['status' => 'borrowed']);

            // Append borrowed book to array
            BorrowedBook::create($borrowedBook);
            History::create($history);
        }



        return view('invoice', [
            'book_id' =>   $borrowedBook['book_id'],
            'date_count' =>   $borrowedBook['date_count'],
            'bookDetails' => json_decode(json_encode($bookDetails)),
            'member' =>$member->name,
            'due_date' => $borrowedBook['due_date'],
            'borrowed_date' => Carbon::now(),
            'price' =>   $totalpricetopay
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book =  BorrowedBook::find($id);
        $book->delete();
        Book::where('id', $book->book_id)->update([
          'status' => 'available'
      ]);
        History::where('borrowed_code', $book->borrowed_code)->update([
          'status' => 'returned'
      ]);

        return redirect()->back()->with('success', "Book is returned back to the library");
    }
}
