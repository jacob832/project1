<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use App\Models\Variation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::first();
        $color=Color::first();
        $variation = Variation::create([
            'price' => 10.000,
            'quantity' => 100,
            'size' => 'M',
            'color_id'=>8,
            'product_id' => 19,
        ]);
        $variation = Variation::create([
            'price' => 7.000,
            'quantity' => 100,
            'size' => 'XL',
            'color_id'=>2,
            'product_id' => 20,
        ]);
        $variation = Variation::create([
            'price' => 9.500,
            'quantity' => 100,
            'size' => 'L',
            'color_id'=>5,
            'product_id' => 21,
        ]);

        $variation = Variation::create([
            'price' => 50.000,
            'quantity' => 100,
            'size' => 'M',
            'color_id'=>7,
            'product_id' => 22,
        ]);
        $variation = Variation::create([
            'price' => 5.000,
            'quantity' => 50,
            'size' => 'S',
            'color_id'=>9,
            'product_id' => 24,
        ]);
    }
}
