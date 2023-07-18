<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Login_LogoutController extends Controller
{
    use GeneralTrait;
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string',
            'password' => 'required|string',
        ]);
        if($validator->fails()){
            return $this->returnError($validator->errors(),'Login Error');
        }


        if (Auth::attempt(['phone_number' => $request['phone_number'],'password' => $request['password']], $request->has('remember')))
        {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return $this->returnData('Hello '.auth()->user()->name,['user' => $user->only('name', 'image',  'phone_number', 'birth'),
            'token' => $token,'id'=>auth()->user()->id]);
        }
        else
        {
            return $this->returnError($validator->errors(),'Invalid phone_number or password');
        }
    }
    
      public function logout(){
        if( Auth::user()->tokens()->delete()){
            return $this->returnSuccessMessage('Successfully Logging out');     
        }
        }

    

}
