<?php

namespace App\Http\Controllers\frontend;

use App\Models\Book;
use App\Models\Card;
use App\Models\Order;
use App\Jobs\SendMails;
use App\Mail\SendUserMail;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\order\StoreSearchRequest;
use App\Http\Requests\checkout\StoreCheckRequest;

class OrderController extends Controller
{
    public function create_order()
    {
        $user_id=Auth::user()->id;
        $order=Card::where('user_id',$user_id)->where('status','penning')->get();
        return view('frontend.checkout.index',compact('order'));
    }

    public function store_order($status)
    {
        $number_order =  session()->get('number_order');
        $user_id=Auth::user()->id;
        $order=Order::where('number_order',$number_order)->first();

        $order_product=Card::select('book_id','quantity','status')->where('user_id',$user_id)->where('status','penning')->get();
        foreach($order_product as $order_product)
        {
            $data['order_id']=$order->id;
            $data['user_id']=$user_id;
            $data['book_id']=$order_product->book_id;
            $data['quantity']=$order_product->quantity;
            $data['price']=$order_product->book->price;
            $data['offer']=$order_product->book->offer;
            $data['status']=$status;
            $data['price_after_offer']=$order_product->book->price_after_offer ? $order_product->book->price_after_offer :$order_product->book->price;
            $data['total_price'] = ($data['price_after_offer'] ? $data['price_after_offer'] : $data['price']) * $data['quantity'];
            $order_products = OrderProduct::create($data);
            $new_quantity_book_id =  ($order_product->book->quantity) - ($order_product->quantity);
            Book::where('id', $order_product->book_id)->update([
                'quantity' => $new_quantity_book_id,
                'stock' => 1,
            ]);
       }
       Card::where('user_id',$user_id)->update(['status' =>'completed']);

        OrderProduct::where('order_id',$order->id)->chunk(20,function($data){
        dispatch(new SendMails($data));
    });

      return redirect()->route('order.details')->with([
        'success' => 'الدفع تم بنجاح , شكرا لك و لقد تلقنيا الطلب و سوف يتم توصيله لك في الموعد المحدد '
    ]);
    }

    public function store_address(StoreCheckRequest $request)
    {
        $user_id=Auth::user()->id;
        $number_order=rand ( 10000 , 99999 );
        session()->put('number_order',$number_order);
       $order= Order::create([
            'user_id'=> $user_id,
            'number_order'=>$number_order,
            ...$request->except('_token')
        ]);

        if($request->status == "كاش")
        {
            return redirect()->route('order.store',$request->status);
        }
        else
        {
            return redirect()->route('payment.index');
        }
    }

    public function edit_address($id)
    {
        $address= Order::where('id',$id)->first();
        return view('frontend.edit_address.index', compact('address'));

    }

    public function update_address(Request $request,$id)
    {
        $data=$request->except('_method','_token');
        Order::where('id',$id)->update($data);
        return redirect()->back();
    }

    public function details_order()
    {
        $number_order =  session()->get('number_order');
        $order=Order::where('number_order',$number_order)->first();
        $products = OrderProduct::where('order_id', $order->id )->get();
        return view('frontend.order-recieved.index' , compact('order','products'));
    }

    public function show_order_user()
    {
        $user_id=Auth::user()->id;
        $order_products=OrderProduct::where('user_id',$user_id)->get();
        return view('frontend.order.index',compact('order_products'));
    }

    public function delete_order_for_user(Request $request ,$id)
    {
     OrderProduct::where('id',$id)->delete();
     return redirect()->back()->with('success','تم بنجاح حذف الطلب');
    }

    public function search_page()
    {
        return view('frontend.track-order.index');
    }

    public function search_order(StoreSearchRequest $request)
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

    public function show_all_order_for_admin()
    {
        $order_products=OrderProduct::paginate(10);
        return view('backend.order.index', compact('order_products'));
    }

    public function delete_order_for_admin(Request $request,$id)
    {
       $order= OrderProduct::findOrFail($request->id);
       $order->delivery_status_of_orders="تم النوصيل";
       $order->save();
        return redirect()->back()->with('delete successfully');
    }
}
