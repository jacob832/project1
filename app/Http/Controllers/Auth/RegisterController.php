<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\RegisterRequest;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class RegisterController extends Controller
{
    use GeneralTrait;
    public function register(Request $request)
    {
        try {
            $validateUser=Validator::make($request->all(), 
            [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' =>  ['required', 'string', 'max:255'],
                'email' =>      ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' =>   ['required', 'string', 'min:6'],
                'password_confirmation' => 'required_with:password|same:password|min:6',               
                'phone' =>      ['nullable', 'string', 'max:20','unique:users'],
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
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'gender'=> $request->gender,
                'birth_date'=>$request->birth_date,
                'image' => $imagePath,

            ]);

            // إنشاء توكن جديد للمستخدم
            $token = $user->createToken('Token Name')->plainTextToken;
            
            // إرجاع الرد المناسب مع التوكن الجديد
            return $this->returnData('CreatUser Successfully', [
                'user' => $user->only('first_name', 'image', 'email', 'phone', 'birth_date'),
                'token' => $token,
            ]);
            

                 //    return $this->returnData('CreatUser Successfully',[$user->only('first_name','image','email','phone','birth_date')]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }

}
}
