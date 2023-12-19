<?php

namespace App\Http\Controllers\frontend;

use App\Models\Book;
use App\Models\Fav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class FavController extends Controller
{
    public function store(Book $book)
    {
        $favBook = Fav::where('book_id', $book->id)->where('user_id', Auth::user()->id)->first();
        if ($favBook) {
            return redirect()->back()->with('error', 'الكتاب مضاف فعليا في المفضلة');
        } else {
            Fav::create([
                'book_id' => $book->id,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->back()->with('success', ' تم اضافة الكتاب في المفضلة');
        }
    }

    public function show()
    {
        $favs = Fav::where('user_id', Auth::user()->id)->paginate(4);
        return view('frontend.favourites.index', compact('favs'));
    }

    public function delete(Request $request, Fav $fav)
    {
        deleteMethod($fav,null);
        return redirect()->back()->with('success', 'تم حذف المفضلة بنجاح ');
    }
}
