<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function borrowedBook()
    {
        return $this->hasOne(BorrowedBook::class, 'book_id');

    }
    public function histories()
    {
        return $this->hasMany(History::class);

    }
}
