<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class, 'member_id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class);

    }
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
