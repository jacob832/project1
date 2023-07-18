<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    use GeneralTrait;       
    public function get_product($parent_id)
    {
    $categories = Category::where('parent_id', $parent_id)->get();
    $products = Product::whereIn('category_id', $categories->pluck('parent_id'))->paginate(10);
    if ($products->isEmpty()) {
        return $this->returnError('No Products Found',null,404);
    }
    return $this->returnData('',$products);
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        $products = Product::where('name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
            ->get();

            return $this->returnData('',$products);

    }

}