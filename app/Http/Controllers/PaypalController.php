<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Srmklive\PayPal\Facades\Paypal;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Events\PaidSuccess;


class PaypalController extends Controller
{
    public function payment()
    {
        $user_id = auth()->user()->id;

        $orders = Card::where('user_id', $user_id)->where('status','penning')->get();

        $items = [];
        $totalAmount = 0;

        foreach ($orders as $order)
        {
            $item = [
                'name' => $order->book->title,
                'des' => $order->book->description,
                'quantity' => $order->quantity,
                'price' => $order->total_price,
            ];

            $items[] = $item;
            $totalAmount += $order->total_price;
        }

        static $invoiceId = 0;
        $data = [];
        $data['items'] = $items;
        $data['invoice_id'] = ++$invoiceId;
        $data['invoice_description'] = "Order {$data['invoice_id']} Invoice";
        $data['return_url'] = 'http://127.0.0.1:8000/HomePage/payment/success';
        $data['cancel_url'] = 'http://127.0.0.1:8000/HomePage/payment/cancel';
        $data['total'] = $totalAmount;
       $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($data, true);
        return redirect($response['paypal_link']);

    }


    public function cancel()
    {
        return redirect()->route('homepage')->with([
            'error' => 'Payment cancelled'
        ]);
    }


    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']) , ['SUCCESS' , 'SUCCESSWITHWARNING']))
        {
            return redirect()->route('order.store','تم الدفع بالفيزا');

        }

        return response()->json('Payment cancelled' , '402');

    }
}
