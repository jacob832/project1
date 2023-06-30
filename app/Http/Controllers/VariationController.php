<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variation;
use App\Http\Traits\GeneralTrait;
use App\Http\Requests\StoreVariationRequest;


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
 
    public function filter(StoreVariationRequest $request)
    {
        $products = Product::with(['variations' => function ($query) use ($request) {
            if ($request->has('price')) {
                $query->where('price', $request->price);
            }
            if ($request->has('size')) {
                $query->where('size', $request->size);
            }
        }]);
        
        if ($request->has('color')) {
            $products->whereHas('variations.color', function ($query) use ($request) {
                $query->where('name', $request->color);
            });
        }
        
        if ($request->has('price')) {
            $products->whereHas('variations', function ($query) use ($request) {
                $query->where('price', $request->price);
            });
        }
        
        if ($request->has('size')) {
            $products->whereHas('variations', function ($query) use ($request) {
                $query->where('size', $request->size);
            });
        }
        $products = $products->get();
        if ($products->isEmpty()) {
            return $this->returnError('Not Found Products',null,404);
        }
        return $this->returnData('',$products);

       
    }

}