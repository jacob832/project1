<?php
namespace App\Http\Controllers;

use Pusher\Pusher;
use App\Models\User;
use App\Models\Product;
use App\Models\Category; 
use Illuminate\Http\Request;
use App\Models\SystemSettings;
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

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $setting = SystemSettings::first();
        return view('admin.products', compact('products', 'categories','setting'));
    }
    

    public function create()
    {
        $categories = Category::all(); // استرداد جميع الفئات
        return view('admin.products', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products_edit', compact('product', 'categories'));
    }    

    

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
