<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    use GeneralTrait;
    public function updateProfile(Request $request)
    {
        $validateUser=Validator::make($request->all(), 
        [
                'name' =>                  ['required', 'string', 'max:255'],
                'password' =>              ['required', 'string', 'min:6'],
                'password_confirmation' => ['required_with:password','same:password'],               
                'phone_number'=>           ['required','string', 'max:20','unique:users'],
                'gender'=>                 ['nullable','string','max:10'],
                'birth' =>                 ['nullable','date'],
                'image' =>                 ['nullable', 'image', 'max:2048'],

        ]);
        if($validateUser->fails()){
            return $this->returnError($validateUser->errors(),'Validation Error');
        }   
        $imagePath = null;
        if (isset($request['image'])) {
            $imagePath = $request['image']->store('public/images');
            $imagePath = str_replace('public/', '', $imagePath);
        }
        $user = Auth::user();
        $user->name           = $request->input('name');
        $user->password       = Hash::make($request->password);
        $user->phone_number   = $request->input('phone_number');
        $user->gender         = $request->input('gender');
        $user->birth          = $request->input('birth');
        $user->image          = $imagePath;
        $user->save();
        return $this->returnSuccessMessage('Modified successfully');
        }
            

    
}

