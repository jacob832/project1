<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Traits\GeneralTrait;

class DiscountController extends Controller
{
    use GeneralTrait;

    public function getDiscounts($id)
    {
        $product = Product::findOrFail($id);
        $variations = $product->variations;
        $discounts = collect();
        foreach ($variations as $variation) {
            $discounts = $discounts->merge($variation->discount);
        }
        if ($discounts->isEmpty()) {
            return $this->returnError('No Discounts Found',null,404);
        }
            return $this->returnData('',$discounts);

    }
}