<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
class RegisterController extends Controller
{
    use GeneralTrait;
    public function register(Request $request)
    {
        try {
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
            $user = User::create([
                'name'                 => $request->name,
                'password'             => Hash::make($request->password),
                'password_confirmation'=> Hash::make($request->password_confirmation),
                'phone_number'         => $request->phone_number,
                'gender'               => $request->gender,
                'birth'                => $request->birth,
                'image'                => $imagePath,
            ]);
            $token = $user->createToken('Token Name')->plainTextToken;
                        return $this->returnData('CreatUser Successfully', [
                'user' => $user->only('name', 'image', 'phone_number', 'birth'),
                'token' => $token,
            ],Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }

}
}
