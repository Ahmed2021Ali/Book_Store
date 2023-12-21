<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\checkout\StoreCheckRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function create()
    {
        return view('frontend.address.store');
    }

    public function store(StoreCheckRequest $request)
    {
        storeMethod($request,'Address',null);
        return redirect()->route('order.create');
    }

    public function show($page)
    {
        $addresses = Address::where('user_id', Auth::user()->id)->get();
        return view('frontend.address.show', compact('addresses'));
    }

    public function edit(Address $address)
    {
        return view('frontend.address.edit', compact('address'));
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        updateMethod($request, $address, null);
        return redirect()->back();
    }

    public function destroy(Address $address)
    {
        deleteMethod($address, null);
        return redirect()->back();
    }
}
