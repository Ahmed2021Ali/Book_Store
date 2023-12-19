<?php



function storeMethod($request, $modelName, $folderName)
{
    $dataValidated = $request->validated();
    if (isset($dataValidated['image'])) {
        $fileName = uploadFile($dataValidated['image'], $folderName);
        $dataValidated['image'] = $fileName;
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
        $fileName = uploadFile($dataValidated['image'], $folderName);
    }
    if (isset($dataValidated['offer'])) {
        $dataValidated['price_after_offer'] = priceAfterOffer($dataValidated['price'], $dataValidated['offer']);
    }
    if (isset($dataValidated['image'])) {
        $modelName->update([
            $dataValidated,
            'image' => isset($dataValidated['image']) ? $fileName : $modelName->image
        ]);
    } else {
        $modelName->update($dataValidated);
    }
}

function deleteMethod($modelName, $folderName)
{
    if ($modelName->image) {
        deleteFile($modelName->image, $folderName);
    }
    $modelName->delete();
}
