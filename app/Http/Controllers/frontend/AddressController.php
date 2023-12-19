<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\checkout\StoreCheckRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function create()
    {
        return view('frontend.address.add_address');
    }

    public function store(StoreCheckRequest $request)
    {
        $number_order = rand(10000, 99999);
        Address::create([
            'user_id' => Auth::user()->id,
            'number_order' => $number_order,
            ...$request->except('_token')
        ]);
        return redirect()->route('order.create');
    }

    public function edit(Address $address)
    {
        return view('frontend.address.edit_address', compact('address'));
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        updateMethod($request, $address, null);
        return redirect()->back();
    }

    public function destroy(Address $address)
    {
        deleteMethod($address,null);
        return redirect()->route('order.create');
    }
}
