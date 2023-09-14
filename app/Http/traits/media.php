<?php

namespace App\Http\traits;

trait media {
    public function uploadPhoto($image,$folder)
    {
        $photoName = uniqid() . '.' . $image->extension();
        $image->move(public_path('/assets/images/'.$folder),$photoName);
        return $photoName;
    }
    public function deletePhoto($photoPath)
    {
        if(file_exists($photoPath)){
            unlink($photoPath);
            return true;
        }
        return false;
    }

    public function price_after_offer($price ,$offer)
    {
        if(isset($offer))
        {
            return $price_after_offer = $price - ( $price * ( $offer / 100 ) );
        }
        else
        {
            return null;
        }

    }
}
