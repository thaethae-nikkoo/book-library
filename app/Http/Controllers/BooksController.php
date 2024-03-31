<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books', [
          'books' =>Book::latest()->with('author')->get()
      ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createbook', [
                   'authors' => Author::all()
               ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book =  $request->validate([
                  'name' => ['required', 'min:3' , 'max:255'],
                  'type' => ['required'],
                'rental_fee' => ['required'],
                'cover' => ['required'],
                  'description' => ['required', 'min:10' , 'max:500'],
                  'author_id' => ['required'],
              ]);
        $book['status'] = 'available';

        $cover = $request->file('cover');

        $file_name = time() . '-' . str_replace(' ', '-', $cover->getClientOriginalName());

        $book['cover'] = $cover->storeAs('/covers', $file_name);

        Book::create($book);
        return redirect(route('books.index'))->with('success', 'Book Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data= Book::where('id', $id)->with('author', 'borrowedBook')->first();

        return view('book', [
         'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('editbook', [
                    'authors' => Author::all(),
                    'book' => Book::where('id', $id)->first()
                ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book =  $request->validate([
         'name' => ['required', 'min:3' , 'max:255'],
         'type' => ['required'],
        'description' => ['required', 'min:10' , 'max:500'],
 'rental_fee' => ['required'],
         'author_id' => ['required']
        ]);


        if($request->file('new_cover')) {

            $old_cover = $request->old_cover;

            if (Storage::disk('public')->exists($old_cover)) {
                // Delete the file
                Storage::disk('public')->delete($old_cover);
            }

            $cover = $request->file('new_cover');

            $file_name = time() . '-' . str_replace(' ', '-', $cover->getClientOriginalName());

            $book['cover'] = $cover->storeAs('/covers', $file_name);
        }

        $b = Book::find($id);
        $b->update($book);
        return redirect(route('books.index'))->with('success', 'Book Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrowed_book= BorrowedBook::where('book_id', $id)->get();
        if(count($borrowed_book) > 0) {
            for($i=0; $i<count($borrowed_book); $i++) {
                $borrowed_book[$i]->delete();
            }
        }
        $history =  History::where('book_id', $id)->get();
        if(count($history) > 0) {
            for($i=0; $i<count($history); $i++) {
                $history[$i]->delete();
            }
        }
        Book::find($id)->delete();

        return redirect(route('books.index'))->with('success', 'Book Deleted');

    }
}
