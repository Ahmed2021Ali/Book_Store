<?php

namespace App\Http\traits;

trait media {
    public function uploadPhoto($image,$folder)
    {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/'.$folder), $imageName);
        return $imageName;
    }
    public function deletePhoto($photo,$folder)
    {
        $photoPath=public_path('images/'.$folder).$photo;
        if(file_exists($photoPath)){
            unlink($photoPath);
            return true;
        }
        return false;
    }

    public function price_after_offer($price ,$offer)
    {
        if(isset($offer)) {
            return $price_after_offer = $price - ( $price * ( $offer / 100 ) );
        } else {
            return null;
        }

    }
}
