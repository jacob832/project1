<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Notifications\LoginNotification;

class Login_LogoutController extends Controller
{
    use GeneralTrait;
    public function login(Request $request)
        {
            // Validate the request parameters
        $validator = Validator::make($request->all(), [
            'phone' => 'required_without:email|string',
            'email' => 'required_without:phone|email|string',
            'password' => 'required|string',

        ]);
        if($validator->fails()){
            return $this->returnError($validator->errors(),'Login Error');
        }
         if (Auth::attempt([
                'phone' => $request['phone'],
                'password' => $request['password']
            ], $request->has('remember'))
            || Auth::attempt([
                'email' => $request['email'],
                'password' => $request['password']
            ], $request->has('remember'))) {
                // Authentication successful
                $user = Auth::user();
                $token = $user->createToken('auth_token')->plainTextToken;
                return $this->returnData('Hello '.auth()->user()->first_name,['token'=>$token,'id'=>auth()->user()->id]);
            }
            else
          {
                return $this->returnError($validator->errors(),'Invalid username or password');
            }

        }
      public function logout(){
            Auth::user()->tokens()->delete();
            return response(['message'=>'Successfully Logging out']);

        }

    }