<?php


function handleUpload($inputName , $model=null){
try{
    if (request()->hasFile($inputName)) {

        if ($model && \File::exists(public_path($model->{$inputName}))) {
            \File::delete(public_path($model->{$inputName}));
        };
        $file = request()->file($inputName);
        $fileName = rand() . $file->getClientOriginalName();
        $file->move(public_path('/uploads'), $fileName);
        $filePath = "/uploads/" . $fileName;

        return $filePath;
    }
}
catch(\Exception $e){
    throw $e;

}


}
function deleteFileIfExit($filePath){
    try {
        if(\File::exists(public_path($filePath))){
            \File::delete(public_path($filePath));
        }
    }
    catch(\Exception $e){
        throw $e;

    }
    }

//     class PosHelper
// {
//     public static function calculateProductDiscount($price, $discountPercentage)
//     {
//         $discountAmount = ($price * $discountPercentage) / 100;
//         return $discountAmount;
//     }
//     public static function calculateProductTax($price, $taxRate)
//     {
//         $taxAmount = ($price * $taxRate) / 100;
//         return $taxAmount;
//     }
// }
