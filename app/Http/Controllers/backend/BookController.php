<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\book\StoreBookRequest;
use App\Http\Requests\book\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public $categories;
    public $books;

    public function __construct()
    {
        $this->categories = new Category();
        $this->books = new Book();
    }

    public function index()
    {
        return view('backend.books.index', [
            'books' => $this->books->getAllBooks(),
        ]);
    }

    public function create()
    {
        return view('backend.books.create', [
            'categories' => $this->categories->getAllCategories(),
        ]);
    }

    public function store(StoreBookRequest $request)
    {
        storeMethod($request,'Book','books');
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة الكتاب']);
    }

    public function edit(Book $book)
    {
        return view('backend.books.edit', [
            'categories' => $this->categories->getAllCategories(),
            'book' => $book
        ]);
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
         updateMethod($request, $book, 'books');
        return redirect()->back()->with(['success' => 'تم بنجاح تحديث الكتاب ']);
    }

    public function destroy(Book $book)
    {
        deleteMethod($book,'books');
        return redirect()->back()->with(['success' => ' تم بنجاح حذف الكتاب']);
    }
}
