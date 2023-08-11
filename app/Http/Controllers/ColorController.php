<?php

namespace App\Http\Controllers;
use App\Models\SystemSettings;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

class ColorController extends Controller
{
    use GeneralTrait;
    public function show($variation_id)
    {
        $colors=Color::whereHas('variations', function($query) use ($variation_id) {
            $query->where('id', $variation_id);
        })->get();
    if ($colors->isEmpty()) {
        return $this->returnError('No Colors Found', null, 404);
    }
        else
        return $this->returnData('',$colors);
    }
    public function create()
    {
        $setting = SystemSettings::first();
       return view('admin.colors', compact('setting'));
    }

    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
            'name' => 'required',
            'hex_code' => 'required',
        ]);

        $color = Color::create($validatedData);

        if ($color) {
            return redirect()->route('colors.index')->with('success', 'Color created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create color.');
        }
        
    }
    

    public function delete(Color $color)
    {
        $color->delete();

        return redirect()->route('colors.index')->with('success', 'Color deleted successfully.');
    }
}
