<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\order\StoreSearchRequest;
use App\Http\Requests\PaymentMethodRequest;
use App\Models\Address;
use App\Models\Card;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        $order = Card::where('user_id', Auth::user()->id)->where('status', 0)->get();
        $addresses = Address::where('user_id', Auth::user()->id)->get();
        return view('frontend.checkout.index', compact('order', 'addresses'));
    }

    public function paymentMethod(PaymentMethodRequest $request)
    {
        $dataValidated = $request->validated();
        if ($dataValidated['paymentMethod'] === 'الدفع_استخدام_باي_بال') {
            return redirect()->route('payment.index', $dataValidated['address']);
        } elseif ($dataValidated['paymentMethod'] === 'الدفع_عند_الاستلام') {
            $order_number = storeOrder($dataValidated['paymentMethod'], $dataValidated['address']);
            return redirect()->route('order.details', $order_number);
        }
    }

    public function detailsOrder($order_number)
    {
        return view('frontend.order-recieved.index', [
            'orders' => Order::where('order_number', $order_number)->get(),
            'address' => Order::where('order_number', $order_number)->first()->address
        ])->with(['success' => 'الدفع تم بنجاح , شكرا لك و لقد تلقنيا الطلب و سوف يتم توصيله لك في الموعد المحدد ']);
    }

    public function showOrderUser()
    {
        return view('frontend.order.index',['orders' => Order::where('user_id', Auth::user()->id)->get()]);
    }

    public function deleteOrder(Order $order)
    {
        deleteMethod($order, null);
        return redirect()->back()->with('success', 'تم بنجاح حذف الطلب');
    }

    public function searchOrder(StoreSearchRequest $request)
    {
        $dataValidated = $request->validated();
        $orders = Order::where('number_order', $dataValidated['number_order'])->get();
        $address = Order::where('number_order', $dataValidated['number_order'])->first()->address;
        if ($orders && $dataValidated['email'] === $address->email) {
            return view('frontend.order-details.index', compact('address', 'orders'));
        } else {
            return redirect()->back()->with('error', 'خطا في ادخال البيانات');
        }
    }

    public function showAllOrder()
    {
        return view('backend.order.index', ['orders' => Order::paginate(10)]);
    }

}
