<?php

namespace App\Http\Controllers\frontend;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{

public function AddCard(Request $request,$id)
{
    $quantity=$request->quantity;
    $user_id=Auth::user()->id;
    $book_id=$id;
    if( $quantity > 0 )
    {
        $cards = Card::select('book_id','quantity','id')->where(function ($query) use ($user_id,$book_id)  {
            $query->where('user_id',$user_id)
                ->where('book_id',$book_id);
         })->first();

        if(isset($cards->book_id))
        {
            $cards->quantity += $quantity;
            $cards->save();
        }
        else
        {
            DB::table('cards')->insert(
                ['user_id' => $user_id, 'book_id' =>$book_id,'quantity'=>$quantity]
            );
        }
        return redirect()->back()->with('success','تم بنجاح اضافة الكتاب الي عربة التسويق الخاص بك');
    }
    else
    {
        return redirect()->back()->with('error','حدث خطا و لا يمكن ادخل عدد الكتب اقل من واحد');
    }
}

public function DestroyCard(Request $request,$id)
{
    Card::where('id',$id)->delete();
    return redirect()->back()->with('success',' تم بنجاح حذف الكتاب من السلة');
}


}
