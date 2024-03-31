<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowedBookController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Librarian;
use Illuminate\Support\Facades\Route;

Route::get('/login', [pagesController::class,"login"])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class,"login"])->middleware('guest');
Route::middleware(Librarian::class)->group(function () {
    Route::get('/home', [pagesController::class,"login"]);
    Route::get('/', [pagesController::class,"login"]);
    Route::get('/logout', [AuthController::class,"logout"]);
    Route::resource('members', UserController::class);
    Route::resource('books', BooksController::class);
    Route::get('/get-members', [UserController::class , 'members']);
    Route::get('/get-librarians', [UserController::class , 'librarians']);
    Route::resource('/borrowed', BorrowedBookController::class);
    Route::resource('/histories', HistoryController::class);
    Route::post('/choose_book', [BorrowedBookController::class,'choose_book'])->name('choose_book');
});
