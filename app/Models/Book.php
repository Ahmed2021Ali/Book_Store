<?php

namespace App\Models;

use App\Models\Fav;
use App\Models\Card;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['category_id','id', 'price', 'title','description','offer','book_page_number','code','status','quantity','image','author_name','price_after_offer','stock'];


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
    public function order_product()
    {
        return $this->hasMany(Order::class);
    }
    public function getAllBooks()
    {
        return Book::with('category')->paginate(8);
    }
}


