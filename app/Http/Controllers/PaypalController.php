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
    public function payment($address)
    {
        $user_id = auth()->user()->id;
        $orders = Card::where('user_id', $user_id)->where('status', 'penning')->get();
        $items = [];
        $totalAmount = 0;
        foreach ($orders as $order) {
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
        $data['return_url'] = route('payment.success', $address);
        $data['cancel_url'] = route('payment.cancel');
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

    public function success(Request $request, $address)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $order_number = storeOrder('تم الدفع_استخدام_باي_بال', $address);
            return redirect()->route('order.details', $order_number);
        }
        return response()->json('Payment cancelled', '402');
    }
}
