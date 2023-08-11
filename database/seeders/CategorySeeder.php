<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Man',
            'parent_id' => 1
        ]);
        Category::create([
            'name' => 'Woman',
            'parent_id' => 2
        ]);
        Category::create([
            'name' => 'Baby',
            'parent_id' => 3
        ]);
    }
}
