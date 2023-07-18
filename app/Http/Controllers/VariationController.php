<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Traits\GeneralTrait;
use App\Http\Requests\StoreVariationRequest;


class VariationController extends Controller
{
    use GeneralTrait;
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $variations = $product->variations()->with('reviews')->get();
        $total_rating = 0;
        $count = 0;
        foreach ($variations as $variation) {
            $reviews = $variation->reviews;
            foreach ($reviews as $review) {
                $total_rating += $review->rating;
                $count++;
            }
        }
        $average_rating = $count > 0 ? $total_rating / $count : 0;
        $average_rating_percentage = $average_rating / 5 * 100;
        if ($variations->isEmpty()) {
            return $this->returnError('No Variations Found',null,404);
        }
       
        return $this->returnData('', [
            'variations' => $variations,
            'average_rating_percentage' => $average_rating_percentage,
        ]);
    }
 
    public function filter(StoreVariationRequest $request)
    {
        $products = Product::whereHas('variations', function ($query) use ($request) {
            if ($request->has('price')) {
                $query->where('price', $request->price);
            }
            if ($request->has('size')) {
                $query->where('size', $request->size);
            }
            if ($request->has('color')) {
                $query->whereHas('color', function ($query) use ($request) {
                    $query->where('name', $request->color);
                });
            }
        })->get();
        
        if ($products->isEmpty()) {
            return $this->returnError('Not Found Products', null, 404);
        }
        
        return $this->returnData('', $products);}

}