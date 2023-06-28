<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    use GeneralTrait;       // Find the category by ID
        public function get_product($parent_id)
{
    $categories = Category::where('parent_id', $parent_id)->get();
    $products = Product::whereIn('category_id', $categories->pluck('parent_id'))->paginate(10);
    if ($products->isEmpty()) {
        return $this->returnError('No Products Found',null,404);
    }
    return $this->returnData('',$products);

}

}