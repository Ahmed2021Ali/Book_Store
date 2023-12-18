<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\order\StoreSearchRequest;
use App\Jobs\SendMails;
use App\Models\Address;
use App\Models\AddressOreder;
use App\Models\Book;
use App\Models\Card;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        $order = Card::where('user_id', Auth::user()->id)->where('status', 'penning')->get();
        $addresses = Address::where('user_id', Auth::user()->id)->get();
        return view('frontend.checkout.index', compact('order', 'addresses'));
    }

    public function store($statusPayment)
    {
        $cardProducts = Card::where('user_id', Auth::user()->id)->where('status', 'penning')->get();
        foreach ($cardProducts as $cardProduct) {
            $data['address_id'] = session()->get('address_id');
            $data['user_id'] = Auth::user()->id;
            $data['book_id'] = $cardProduct->book_id;
            $data['quantity'] = $cardProduct->quantity;
            $data['price'] = $cardProduct->book->price;
            $data['offer'] = $cardProduct->book->offer;
            $data['status_payment'] = $statusPayment;
            $data['price_after_offer'] = $cardProduct->book->price_after_offer ? $cardProduct->book->price_after_offer : $cardProduct->book->price;
            $data['total_price'] = ($data['price_after_offer'] ? $data['price_after_offer'] : $data['price']) * $data['quantity'];
            $order_products = OrderProduct::create([$data]);
            $new_quantity_book_id = ($cardProduct->book->quantity) - ($cardProduct->quantity);
            Book::where('id', $cardProduct->book_id)->update([
                'quantity' => $new_quantity_book_id,
                'stock' => 1,
            ]);
        }
        Card::where('user_id', Auth::user()->id)->update(['status' => 'completed']);
        OrderProduct::where('order_id', Auth::user()->id)->chunk(20, function ($data) {
            dispatch(new SendMails($data));
        });
        return redirect()->route('order.details')->with([
            'success' => 'الدفع تم بنجاح , شكرا لك و لقد تلقنيا الطلب و سوف يتم توصيله لك في الموعد المحدد '
        ]);
    }


    public function status_payment(Request $request)
    {
        session()->put('address_id', $request->address_id);

        if ($request->statusPayment == "كاش") {
            return redirect()->route('order.store', $request->statusPayment);
        } else {
            return redirect()->route('payment.index');
        }
    }

    public function details_order()
    {
        $order = Address::where('ID', session()->get('address_id'))->first();
        $products = OrderProduct::where('address_id', $order->id)->get();
        return view('frontend.order-recieved.index', compact('order', 'products'));
    }

    public function show_order_user()
    {
        $user_id = Auth::user()->id;
        $order_products = OrderProduct::where('user_id', $user_id)->get();
        return view('frontend.order.index', compact('order_products'));
    }

    public function delete_order_for_user(Request $request, $id)
    {
        OrderProduct::where('id', $id)->delete();
        return redirect()->back()->with('success', 'تم بنجاح حذف الطلب');
    }

    public function search_page()
    {
        return view('frontend.track-order.index');
    }

    public function search_order(StoreSearchRequest $request)
    {
        $order = Order::where('number_order', $request->number_order)->where('email', $request->email)->first();

        if ($order) {
            $order_products = OrderProduct::where('order_id', $order->id)->get();
            return view('frontend.order-details.index', compact('order', 'order_products'));
        } else {
            return redirect()->back()->with('error', 'خطا في ادخال البيانات');
        }
    }

    public function show_all_order_for_admin()
    {
        $order_products = OrderProduct::paginate(10);
        return view('backend.order.index', compact('order_products'));
    }

    public function delete_order_for_admin(Request $request, $id)
    {
        $order = OrderProduct::findOrFail($request->id);
        $order->delivery_status_of_orders = "تم النوصيل";
        $order->save();
        return redirect()->back()->with('delete successfully');
    }
}
