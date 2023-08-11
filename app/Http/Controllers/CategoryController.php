<?php

namespace App\Http\Controllers;
use App\Models\SystemSettings;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

class CategoryController extends Controller
{
    use GeneralTrait;
    public function get_category()
    {
        $categories = Category::all();
        if(!$categories){
            return $this->returnError('','Error in Categories');
        }
        else
        return $this->returnData('',['categories'=>$categories]);
}
    public function index()
    {
        $categories = Category::with('parent')->get();
        $setting = SystemSettings::first();
        return view('admin.categories', compact('categories','setting'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        $categories = Category::all();
    
        return view('admin.categories_edit', compact('category', 'categories'));
    }
    
    

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
