<?php

namespace App\Http\Controllers\frontend;

use App\Http\Requests\StoreCardRequest;
use App\Models\Book;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{

    public function store(StoreCardRequest $request, Book $book)
    {
        $dataValidated = $request->validated();
        /* status -> 0 => book has existed in card but status->1 =>book has buy and exist in order  */
        $card = Card::where('user_id', Auth::user()->id)->where('book_id', $book->id)->where('status', 0)->first();
        if ($card) {
            $card->quantity += $dataValidated['quantity'];
            if ($card->quantity > $book->quantity) {
                return redirect()->back()->with('error', 'الكمية غير متوفره');
            } else {
                $card->save();
                return redirect()->back()->with('success', 'تم زيادة العدد المطلوب لهذا الكتاب');
            }
        } else {
            if ($dataValidated['quantity'] > $book->quantity) {
                return redirect()->back()->with('error', 'الكمية غير متوفره');
            } else {
                Card::create([
                    'user_id' => Auth::user()->id,
                    'book_id' => $book->id,
                    'quantity' => $dataValidated['quantity'],
                ]);
                return redirect()->back()->with('success', 'تم بنجاح اضافة الكتاب الي عربة التسويق الخاص بك');
            }
        }
    }


    public function delete(Request $request, Card $card)
    {
        deleteMethod($card, null);
        return redirect()->back()->with('success', ' تم بنجاح حذف الكتاب من السلة');
    }


}
