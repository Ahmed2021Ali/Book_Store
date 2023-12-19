<?php

namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Book;
use App\Models\Branch;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class HomepageController extends Controller
{
    public function index()
    {
        $offers = Book::where('status', 1)->orderBy('offer', 'desc')->limit(10)->get();
        $newly = Book::where('status', 1)->latest('id')->take(10)->get();
        $sliders = Slider::where('status', 1)->get();
        $banners = Banner::where('status', 1)->get();
        $bestseller = Book::where('stock', 1)->where('status', 1)->get();
        return view('frontend.home.index', compact('banners', 'sliders', 'offers', 'newly', 'bestseller'));
    }

    public function booksCategory($encryptedId)
    {
        $books = Book::where('status', 1)->where('category_id', Crypt::decrypt($encryptedId))->paginate(8);
        return view('frontend.shop.index', compact('books'));
    }
    public function showAllBooks()
    {
        $books = Book::where('status', 1)->paginate(8);
        return view('frontend.shop.index', compact('books'));
    }

    public function book($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $FAQ = Faq::where('status', 1)->get();
        $book = Book::where('id', $id)->first();
        $category_books = Book::where('category_id', $book->category_id)->take(4)->get();
        return view('frontend.single-product.index', compact('book', 'FAQ', 'category_books'));
    }

    public function branches()
    {
        $branches = Branch::where('status', 1)->get();
        return view('frontend.branch.index', compact('branches'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $books = Book::where(function ($q) use ($search) {
            $q->where('title', 'like', "%$search%")
                ->orwhere('author_name', 'like', "%$search%")
                ->orwhere('description', 'like', "%$search%");
        })->where('status', 1)
            ->orwhereHas('category', function ($q) use ($search) {
                $q->where('title', "$search");
            })->paginate(8);

        if($books->isNotEmpty()){
            return view('frontend.shop.index', compact('books'));
        }else{
            return redirect()->route('books.all');
        }
    }

}
