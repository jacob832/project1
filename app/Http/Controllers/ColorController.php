<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Traits\GeneralTrait;

class ColorController extends Controller
{
    use GeneralTrait;
    public function show($variation_id)
    {
        $colors = Color::whereHas('variations', 
        function($query) use ($variation_id) {
            $query->where('id', $variation_id);
        })->get();
        
        return $this->returnData('',$colors);
    }
    
}