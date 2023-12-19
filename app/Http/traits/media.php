<?php

namespace App\Http\traits;


use Illuminate\Support\Arr;

trait media
{

    public function uploadPhoto($image, $folder)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/' . $folder), $imageName);
        return $imageName;
    }

    public function deletePhoto($photo, $folder)
    {
        $photoPath = public_path('images/' . $folder) . $photo;
        if (file_exists($photoPath)) {
            unlink($photoPath);
            return true;
        }
        return false;
    }

    public function priceAfterOffer($price, $offer)
    {
        if (isset($offer)) {
            return $price_after_offer = $price - ($price * ($offer / 100));
        } else {
            return null;
        }

    }

    public function storeMethod($request, $modelName, $folderPhoto)
    {
        $data = $request->validated();
        if (isset($data['image'])) {
            $PhotoName = $this->uploadPhoto($data['image'], $folderPhoto);
            $data['image'] = $PhotoName;
        }
        if (isset($data['offer'])) {
            $data['price_after_offer'] = $this->priceAfterOffer($data['price'], $data['offer']);
        }
        $model_prefix = "App\Models";
        $modal = $model_prefix . '\\' . $modelName;
        return $modal::create($data);
    }

/*    public function updateMethod($request, $model, $folderPhoto)
    {
        $data = $request->validated();

        $model_prefix = "App\Models";
        $modal = $model_prefix . '\\' . $modelName;

        if (isset($data['image'])) {
            $this->deletePhoto($book->image, 'books');
            $photoName = $this->uploadPhoto($data['image'], 'books');
        }
        $data['price_after_offer'] = $this->price_after_offer($data['price'], $data['offer']);
        $book->update([
            ...Arr::except($data, ['image']),
            'image' => isset($data['image']) ? $photoName : $book->image,
        ]);
    }*/
}
