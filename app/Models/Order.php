<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'city',
        'address',
        'phone',
        'email',
        'note',
        'book_id ',
        'number_order',
    ];

    protected $with=['book','user'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
