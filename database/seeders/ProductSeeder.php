<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Variation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::first();

        $product = Product::create([
            'name' => 'pants',
            'description' => 'Mens jeans',
            'category_id' => $category->id,
        ]);
        $product = Product::create([
            'name' => 'sweaters',
            'description' => 'cotton',
            'category_id' => $category->id,
        ]);
        $product = Product::create([
            'name' => 'shirt',
            'description' => 'Long sleeve shirt',
            'category_id' => $category->id,
        ]);
        $product = Product::create([
            'name' => 'طقم رسمي',
            'description' => 'رسمي',
            'category_id' => $category->id,
        ]);
        $product = Product::create([
            'name' => 'shirt',
            'description' => 'Long sleeve shirt',
            'category_id' => 2,
        ]);        
        $product = Product::create([
            'name' => 'children clothes',
            'description' => 'قطنيات',
            'category_id' => 3,
        ]);
       
    }
}
