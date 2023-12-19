<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Http\Requests\order\StoreSearchRequest;
use App\Jobs\SendMails;
use App\Models\Address;
use App\Models\Book;
use App\Models\Card;
use App\Models\Order;
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
            $data['price_after_offer'] = $cardProduct->book->offer ? $cardProduct->book->price_after_offer : null;
            $data['total_price'] = ($data['offer'] ? $data['price_after_offer'] : $data['price']) * $data['quantity'];
             Order::create([$data]);
            Book::where('id', $cardProduct->book_id)->update([
                'quantity' => ($cardProduct->book->quantity) - ($cardProduct->quantity),
                'stock' => 1,
            ]);
        }
            /* status -> 0 => book has existed in card but status->1 =>book has buy and exist in order  */
        Card::where('user_id', Auth::user()->id)->where('status', 0)->update(['status' => 1]);
        Order::where('order_id', Auth::user()->id)->chunk(20, function ($data) {
            dispatch(new SendMails($data));
        });
        return redirect()->route('order.details',session()->get('address_id'))->with(['success' => 'الدفع تم بنجاح , شكرا لك و لقد تلقنيا الطلب و سوف يتم توصيله لك في الموعد المحدد ']);
    }

    public function statusPayment(Request $request)
    {
        session()->put('address_id', $request->address_id);
        if ($request->statusPayment == "الدفع_عند_الاستلام") {
            return redirect()->route('order.store', $request->statusPayment);
        } else {
            return redirect()->route('payment.index');
        }
    }

    public function detailsOrder($address_id)
    {
        return view('frontend.order-recieved.index', [
            'orders' => Address::where('id', $address_id)->first(),
            'address'=>Order::where('address_id', $address_id)->get()
        ]);
    }

    public function showOrderUser()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('frontend.order.index', compact('orders'));
    }

    public function deleteOrder(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'تم بنجاح حذف الطلب');
    }

    public function searchOrder(StoreSearchRequest $request)
    {
        $address = Address::where('number_order', $request->number_order)->where('email', $request->email)->first();
        if ($address) {
            $orders= Order::where('address_id', $address->id)->get();
            return view('frontend.order-details.index', compact('address', 'orders'));
        } else {
            return redirect()->back()->with('error', 'خطا في ادخال البيانات');
        }
    }
    public function showAllOrder()
    {
        return view('backend.order.index',['orders' => Order::paginate(10)]);
    }

/*    public function delete_order_for_admin(Request $request, $id)
    {
        $order = Order::findOrFail($request->id);
        $order->delivery_status_of_orders = "تم النوصيل";
        $order->save();
        return redirect()->back()->with('delete successfully');
    }*/
}
