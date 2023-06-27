<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

}
