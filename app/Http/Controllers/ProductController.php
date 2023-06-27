<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    use GeneralTrait;
    public function get_product(Request $request, $category_id)
    {
        // Find the category by ID
        $category = Category::findOrFail($category_id);

        // Retrieve all products for the category
        $products = $category->products;

        // Return the products
        return response()->json([
            'status' => 'success',
            'message' => 'Products retrieved successfully',
            'data' => $products,
        ]);

}}