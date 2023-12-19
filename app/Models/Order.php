<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';

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
        'delivery_status_of_orders'
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
