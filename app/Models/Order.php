<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'address_id',
        'user_id',
        'book_id',
        'quantity',
        'price',
        'offer',
        'price_after_offer',
        'total_price',
        'status_payment',
        'delivery_status_of_orders',
        'order_number'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
