<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use App\Models\Product;
use App\Models\Variation;


class VariationController extends Controller
{
    use GeneralTrait;
    public function show($id)
    {
        $product = Product::find($id);
        $variations = $product->variations;
        if ($variations->isEmpty()) {
            return $this->returnError('No Variations Found',null,404);
        }
        return $this->returnData('',$variations);
    }
}