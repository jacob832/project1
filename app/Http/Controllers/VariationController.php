<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Variation;
use Illuminate\Http\Request;
use App\Models\SystemSettings;
=======
>>>>>>> origin/master
use App\Models\Product;
use App\Http\Traits\GeneralTrait;
use App\Http\Requests\StoreVariationRequest;

<<<<<<< HEAD
=======

>>>>>>> origin/master
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

<<<<<<< HEAD
    public function create()
    {
        $products = \App\Models\Product::all();
        $colors = \App\Models\Color::all();
        $variations = \App\Models\Variation::all();
        $setting = SystemSettings::first();
        return view('admin.variations', compact('products', 'colors', 'variations','setting'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'color_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'size' => 'required',
        ]);

        Variation::create($validatedData);

        return redirect()->route('variations.create');     

    }

    public function edit(Variation $variation)
    {
        $products = \App\Models\Product::all();
        $colors = \App\Models\Color::all();
    
        return view('admin.variation_edit', compact('variation', 'products', 'colors'));
    }
    
    public function update(Request $request, Variation $variation)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'color_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'size' => 'required',
        ]);
    
        $variation->update($validatedData);
    
        // تنفيذ العمليات المطلوبة بعد التعديل بنجاح (مثل التوجيه أو إظهار رسالة)
        return redirect()->route('variations.create')->with('success', 'Variation updated successfully');
    }
    

    public function delete(Variation $variation)
    {
        $variation->delete();
        return redirect()->route('variations.create');   

        // تنفيذ العمليات المطلوبة بعد الحذف بنجاح (مثل التوجيه أو إظهار رسالة)
    }
}
=======
}
>>>>>>> origin/master
