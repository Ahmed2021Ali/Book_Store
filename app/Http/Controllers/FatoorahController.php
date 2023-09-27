<?php

namespace App\Http\Controllers;

use App\Http\Service\FatoorahServices;
use Illuminate\Http\Request;


class FatoorahController extends Controller
{
    private $fatoorahServices;

    public function __construct(FatoorahServices $fatoorahServices)
    {
      $this->fatoorahServices=$fatoorahServices;
    }

    public function checkout(Request $request)
    {
//        $fatoorahServices = new FatoorahServices();

        $data=[
        'NotificationOption' => 'Lnk',
        'InvoiceValue'       => '50',
        'CustomerName'       => 'Ahmed ALi',
        'DisplayCurrencyIso' => 'KWD',
        'MobileCountryCode'  => '+965',
        'CustomerEmail'      => 'email@example.com',
        'CallBackUrl'        => 'https://google.com',
        'ErrorUrl'           => 'https://youtube.com',
        'Language'           => 'en',
        ];

       return $this->fatoorahServices->sendPayment($data);
    }


}