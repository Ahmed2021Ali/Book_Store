<?php

namespace App\Http\Controllers\frontend;

use App\Models\Book;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{

public function addCard(Request $request,$id)
{
    $quantity=$request->quantity;
    $book_id=$id;

    if( $quantity > 0 ) {
        $cards = Card::where(function ($query) use ($book_id)  {
            $query->where('user_id',Auth::user()->id)->where('book_id',$book_id)->where('status','penning');
         })->first();
         $quantity_book=Book::select('quantity')->where('id',$book_id)->first();

        if($cards) {
            $cards->quantity += $quantity;
            if($cards->quantity > $cards->book->quantity) {
                return redirect()->back()->with('error','الكمية غير متوفره');
            } else {
                $cards->save();
                return redirect()->back()->with('success','تم زيادة العدد المطلوب لهذا الكتاب');
            }
        } else {
            if($quantity > $quantity_book->quantity) {
                return redirect()->back()->with('error','الكمية غير متوفره');
            } else {
                Card::insert([
                    'user_id' => Auth::user()->id,
                    'book_id' =>$book_id,
                    'quantity'=>$quantity,
                    ]);
                return redirect()->back()->with('success','تم بنجاح اضافة الكتاب الي عربة التسويق الخاص بك');
            }
        }
    } else {
        return redirect()->back()->with('error','حدث خطا و لا يمكن ادخل عدد الكتب اقل من واحد');
    }
}

public function destroyCard(Request $request,Card $card)
{
    $card->delete();
    return redirect()->back()->with('success',' تم بنجاح حذف الكتاب من السلة');
}


}
