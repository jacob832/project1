<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\ProfileUpdateRequest;

class ProfileController extends Controller
{

    use GeneralTrait;
    public function updateProfile(Request $request)
    {

        $validateUser=Validator::make($request->all(), 
        [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' =>  ['required', 'string', 'max:255'],
            'email' =>      ['required', 'string', 'email', 'max:255'],
            'password' =>   ['required', 'string', 'min:8'],
            'phone' =>      ['nullable', 'string', 'max:20'],
            'gender'=>      ['nullable','string','max:10'],
            'birth_date' => ['nullable','date'],
            'image' =>      ['nullable', 'image', 'max:2048'],

        ]);
        if($validateUser->fails()){
            return $this->returnError($validateUser->errors(),'Validation Error');
        }   
        $imagePath = null;
        if (isset($request['image'])) {
            $imagePath = $request['image']->store('public/images');
            $imagePath = str_replace('public/', '', $imagePath);
        }
        $user = Auth::user(); // get the currently authenticated user
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->password= Hash::make($request->password);
        $user->phone= $request->input('phone');
        $user->gender= $request->input('gender');
        $user->email = $request->input('email');
        $user->birth_date= $request->input('birth_date');
        $user->birth_date= $request->input('birth_date');
        $user->image=$imagePath;
        $user->save();
        return $this->returnSuccessMessage('Modified successfully');
        }
       

    
}

