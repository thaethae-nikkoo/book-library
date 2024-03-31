<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class);
    }
    public function histories()
    {
        return $this->hasMany(History::class, 'author_id');
    }
}
