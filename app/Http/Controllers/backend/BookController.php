<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\book\StoreBookRequest;
use App\Http\Requests\book\UpdateBookRequest;
use App\Http\traits\media;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class BookController extends Controller
{
    use media;

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
        $this->storeMethod($request,'Book','books');
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
        $data = $request->validated();
        if (isset($data['image'])) {
            $this->deletePhoto($book->image, 'books');
            $photoName = $this->uploadPhoto($data['image'], 'books');
        }
        $data['price_after_offer'] = $this->price_after_offer($data['price'], $data['offer']);
        $book->update([
            ...Arr::except($data,['image']),
            'image'=>isset($data['image']) ? $photoName : $book->image,
        ]);
        return redirect()->back()->with(['success' => 'تم بنجاح تحديث الكتاب ']);
    }

    public function destroy(Book $book)
    {
        $this->deletePhoto($book->image, 'books');
        $book->delete();
        return redirect()->back()->with(['success' => ' تم بنجاح حذف الكتاب']);
    }
}
