<?php

function uploadFile($image, $folderName)
{
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('images/' . $folderName), $imageName);
    return $imageName;
}

function deleteFile($photo, $folderName)
{
    $photoPath = public_path('images/' . $folderName) . $photo;
    if (file_exists($photoPath)) {
        unlink($photoPath);
        return true;
    }
    return false;
}
 function priceAfterOffer($price, $offer)
{
    if (isset($offer)) {
        return $price_after_offer = $price - ($price * ($offer / 100));
    } else {
        return null;
    }
}
