<?php

namespace App\Http\Controllers\frontend;

use App\Http\Requests\order\StoreSearchRequest;
use App\Models\Card;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\checkout\StoreCheckRequest;

class OrderController extends Controller
{
    public function create()
    {
        $user_id=Auth::user()->id;
        $order=Card::where('user_id',$user_id)->get();
        return view('frontend.checkout.index',compact('order'));
    }

    public function store(StoreCheckRequest $request)
    {
        $number_order=rand ( 10000 , 99999 );
        session()->put('number_order', $number_order);
        $user_id=Auth::user()->id;
        $order=Card::select('book_id','quantity','user_id','id')->where('user_id',$user_id)->get();
        foreach($order as $orders)
        {
            $data=$request->except('_token');
            $data['number_order']=$number_order;
            $data['book_id']=$orders->book_id;
            $data['user_id']=$orders->user_id;
            $data['quantity']=$orders->quantity;
            $data['created_at'] = now();
            DB::table('orders')->insert($data);
            DB::table('cards')->where('id',$orders->id)->delete();

            $new_quantity_book_id =  ($orders->book->quantity) - ($orders->quantity) ;
            DB::table('books')->where('id', $orders->book_id)->update(['quantity' => $new_quantity_book_id ]);
        }
        return redirect()->route('order.detail');
    }
    public function detail()
    {
        $number_order =  session()->get('number_order');
        $order=Order::select('book_id','quantity','created_at','number_order')->where('number_order',$number_order)->get();
        $user = DB::table('orders')->select('fname','lname','email','phone','city','address')->where('number_order', $number_order)->distinct()->first();
        return view('frontend.order-recieved.index' , compact('order','user') );
    }
    public function show()
    {
    $user_id=Auth::user()->id;

    $order=Order::select('book_id','quantity','created_at','number_order')->where('user_id',$user_id)->paginate(5);

    return view('frontend.order.index',compact('order'));
    }
    public function destroy(Request $request ,$id)
    {
     $number_order=$id;
     Order::where('number_order',$number_order)->delete();
    return redirect()->back()->with('success','تم بنجاح حذف الطلب');
    }
    public function search()
    {
        return view('frontend.track-order.index');
    }
    public function data_search(StoreSearchRequest $request)
    {
       $order=Order::select('book_id','quantity','created_at','number_order')->where('number_order',$request->number_order)->where('email',$request->email)->get();
      $user = DB::table('orders')->select('fname','lname','email','phone','city','address','number_order')->where('number_order',$request->number_order)->where('email',$request->email)->distinct()->first();
    if(!empty($order) && !empty($user))
    {
        return view('frontend.order-details.index', compact('order','user'));
    }
    else
    {
        return redirect()->back()->with('error','خطا في ادخال البيانات');
    }
    }

    public function edit_address($number_order)
    {
        echo $number_order;
    }
}
