<?php

namespace App\Http\Controllers\frontend;

use App\Http\Requests\order\StoreSearchRequest;
use App\Models\Book;
use App\Models\Card;
use App\Models\Order;
use App\Models\OrderProduct;
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
        $order=Card::where('user_id',$user_id)->where('status','penning')->get();
        return view('frontend.checkout.index',compact('order'));
    }

    public function store_address(StoreCheckRequest $request)
    {
        $user_id=Auth::user()->id;
        $number_order=rand ( 10000 , 99999 );
        session()->put('number_order',$number_order);
        Order::create([
            'user_id'=> $user_id,
            'number_order'=>$number_order,
            ...$request->except('_token')
        ]);
        return redirect()->route('payment.index');
    }

    public function store_order()
    {
        $number_order =  session()->get('number_order');
        $user_id=Auth::user()->id;
        $order=Order::select('id')->where('number_order',$number_order)->first();

        $order_product=Card::select('book_id','quantity','status')->where('user_id',$user_id)->where('status','penning')->get();
        foreach($order_product as $order_product)
        {
            $data['order_id']=$order->id;
            $data['user_id']=$user_id;
            $data['book_id']=$order_product->book_id;
            $data['quantity']=$order_product->quantity;
            $data['price']=$order_product->book->price;
            $data['offer']=$order_product->book->offer;
            $data['price_after_offer']=$order_product->book->price_after_offer ? $order_product->book->price_after_offer :$order_product->book->price;
            $data['total_price'] = ($data['price_after_offer'] ? $data['price_after_offer'] : $data['price']) * $data['quantity'];
            OrderProduct::create($data);
            $new_quantity_book_id =  ($order_product->book->quantity) - ($order_product->quantity);
            Book::where('id', $order_product->book_id)->update([
                'quantity' => $new_quantity_book_id,
                'stock' => 1,
            ]);
       }
       Card::where('user_id',$user_id)->update(['status' =>'completed']);

      return redirect()->route('order.detail')->with([
        'success' => 'Paid successfully , thank you we will receive the order '
    ]);
    }
    public function detail()
    {
        $number_order =  session()->get('number_order');
        $order=Order::where('number_order',$number_order)->first();
        $products = OrderProduct::where('order_id', $order->id )->get();
        return view('frontend.order-recieved.index' , compact('order','products'));
    }
    public function show()
    {
        $user_id=Auth::user()->id;
        $order_products=OrderProduct::where('user_id',$user_id)->get();
        return view('frontend.order.index',compact('order_products'));
    }
    public function destroy(Request $request ,$id)
    {
     OrderProduct::where('id',$id)->delete();
     return redirect()->back()->with('success','تم بنجاح حذف الطلب');
    }
    public function search()
    {
        return view('frontend.track-order.index');
    }
    public function data_search(StoreSearchRequest $request)
    {
       $order=Order::where('number_order',$request->number_order)->where('email',$request->email)->first();

        if($order)
        {
            $order_products=OrderProduct::where('order_id',$order->id)->get();
            return view('frontend.order-details.index', compact('order','order_products'));
        }
        else
        {
            return redirect()->back()->with('error','خطا في ادخال البيانات');
        }
    }

    public function edit_address($id)
    {
        echo $id;
    }
}
