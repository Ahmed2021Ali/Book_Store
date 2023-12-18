<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fav extends Model
{
    use HasFactory;
    protected $fillable=['book_id','user_id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
