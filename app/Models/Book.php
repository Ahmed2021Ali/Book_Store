<?php

namespace App\Models;

use App\Models\Fav;
use App\Models\Card;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
      public function card()
    {
        return $this->hasMany(Card::class);
    }
    public function fav()
    {
        return $this->hasMany(Fav::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}

