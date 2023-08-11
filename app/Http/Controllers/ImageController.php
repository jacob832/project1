<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use App\Models\Product;


class ImageController extends Controller
{
    use GeneralTrait;
    public function showProductImages($id)
    {
        $product = Product::findOrFail($id);
        $images = $product->variations()->with('images')->get()->pluck('images')->flatten();
        if ($images->isEmpty()) {
            return $this->returnError('No Image Found',null,404);
        }
        return $this->returnData('',$images);
    }
}