<?php


use App\Models\Address;
use App\Models\Book;
use App\Models\Card;
use App\Models\Order;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

function storeMethod($request, $modelName, $folderName)
{
    $dataValidated = $request->validated();
    if (isset($dataValidated['image'])) {
        $dataValidated['image'] = uploadFile($dataValidated['image'], $folderName);
    }
    if (isset($dataValidated['offer'])) {
        $dataValidated['price_after_offer'] = priceAfterOffer($dataValidated['price'], $dataValidated['offer']);
    }
    $model_prefix = "App\Models";
    $modal = $model_prefix . '\\' . $modelName;
    return $modal::create($dataValidated);
}

function updateMethod($request, $modelName, $folderName)
{
    $dataValidated = $request->validated();
    if (isset($dataValidated['image'])) {
        deleteFile($modelName->image, $folderName);
        $dataValidated['image']= uploadFile($dataValidated['image'], $folderName);
    }
    if (isset($dataValidated['offer'])) {
        $dataValidated['price_after_offer'] = priceAfterOffer($dataValidated['price'], $dataValidated['offer']);
    }
    if (isset($dataValidated['image'])) {
        $modelName->update($dataValidated);
    } else {
        $modelName->update(Arr::except($dataValidated,['image']));
    }
}

function deleteMethod($modelName, $folderName)
{
    if ($modelName->image) {
        deleteFile($modelName->image, $folderName);
    }
    $modelName->delete();
}

function storeOrder($paymentMethod, $address)
{
    $order_number = Str::random(16);
    $cardProducts = Card::where('user_id', Auth::user()->id)->where('status', 0)->get();
    foreach ($cardProducts as $cardProduct)
    {
        $data=Arr::except($cardProduct->toArray(),['book','status']);
        $data['order_number']=$order_number;
        $data['address_id'] = $address;
        $data['price'] = $cardProduct->book->price;
        $data['offer'] = $cardProduct->book->offer;
        $data['status_payment'] = $paymentMethod;
        $data['price_after_offer'] = $cardProduct->book->offer ? $cardProduct->book->price_after_offer : null;
        $data['total_price'] = ($data['offer'] ? $data['price_after_offer'] : $data['price']) * $cardProduct->quantity;
        Order::create($data);
        Book::where('id', $cardProduct->book_id)->update([
            'quantity' => ($cardProduct->book->quantity) - ($cardProduct->quantity),
            'stock' => 1 + $cardProduct->book->stock,
        ]);
        /* status -> 0 => book has existed in card but status->1 =>book has buy and exist in order  */
        $cardProduct->update(['status' => 1]);
    }
    /*        Order::where('order_id', Auth::user()->id)->chunk(20, function ($data) {
                dispatch(new SendMails($data));
            });*/
    return $order_number;
}

