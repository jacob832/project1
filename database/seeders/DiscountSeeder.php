<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\Variation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $variation=Variation::first();
        $discount = Discount::create([
            'start_date' => '2022-01-01',
            'end_date' => '2022-01-31',
            'discount' => 10,
            'variation_id'=>15
        ]);
        $discount = Discount::create([
            'start_date' => '2022-2-23',
            'end_date' => '2022-02-26',
            'discount' => 15,
            'variation_id'=>12
        ]);
    }
}
