<?php

namespace App\Http\Controllers\backend;


use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashbordController extends Controller
{
    public function index()
    {
        $user_count = User::count();
        $book_count = Book::count();
        $order_count = Order::count();
        return view('backend.dashbord.index', compact('user_count','book_count','order_count') );
    }

}
