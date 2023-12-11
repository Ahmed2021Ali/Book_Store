<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\checkout\StoreCheckRequest;
use App\Models\AddressOreder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressOrederController extends Controller
{

    public function create()
    {
        return view('frontend.address.add_address');
    }

    public function store (StoreCheckRequest $request)
    {
        $user_id=Auth::user()->id;
        $number_order=rand ( 10000 , 99999 );
        $order= AddressOreder::create([
            'user_id'=> $user_id,
            'number_order'=>$number_order,
            ...$request->except('_token')
        ]);
        return redirect()->route('order.create');
    }

    public function edit(AddressOreder $address)
    {
        return view('frontend.address.edit_address', compact('address'));
    }

    public function update(Request $request, AddressOreder $address)
    {
        $data=$request->except('_method','_token');
        $address->update($data);
        return redirect()->route('order.create');
    }

    public function destroy(AddressOreder $address)
    {
        $address->delete();
        return redirect()->route('order.create');
    }
}
