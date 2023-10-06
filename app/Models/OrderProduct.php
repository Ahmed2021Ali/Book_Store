<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'book_id',
        'quantity',
        'price',
        'offer',
        'price_after_offer',
        'total_price'

    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}