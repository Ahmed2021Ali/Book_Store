<?php

namespace App\Http\Controllers\frontend;

use App\Models\Fav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;





class FavController extends Controller
{
    public function store($id)
    {
        $data['book_id']=$id;
        $data['created_at'] = now();
        $data['user_id']=Auth::user()->id;
        $book=Fav::where('book_id',$id)->where('user_id',Auth::user()->id)->get();
        if($book->isNotEmpty())
        {
        return redirect()->back()->with('error','الكتاب مضاف فعليا في المفضلة');
        }
        else
        {
            Fav::insert($data);
            return redirect()->back()->with('success',' تم اضافة الكتاب في المفضلة') ;
        }
    }

    public function show()
    {
        $favs=Fav::where('user_id',Auth::user()->id)->paginate(4);
        return view('frontend.favourites.index',compact('favs'));
    }
    public function destroy(Request $request ,$id)
    {
        $data['book_id']=$id;
        $data['user_id']=Auth::user()->id;
        Fav::where('book_id',$id)->where('user_id',Auth::user()->id)->delete();
        return redirect()->back()->with('success','تم حذف المفضلة بنجاح ');
    }
}
