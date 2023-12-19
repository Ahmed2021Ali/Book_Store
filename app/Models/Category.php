<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $with=['book'];

    public function book()
    {
        return $this->hasMany(Book::class);
    }
    public function getAllCategories()
    {
        return Category::all();
    }
}
