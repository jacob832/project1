<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ForgetPasswordController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|regex:/^[0-9]{10}$/|exists:users,phone_number',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::where('phone_number', $request->phone_number)->first();

        $token = Password::getRepository()->create($user);

        $this->sendVerificationCode($request->phone_number, $token);

        return response()->json([
            'message' => 'Verification code sent successfully',
        ]);
    }
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|regex:/^[0-9]{10}$/|exists:users,phone_number',
            'code' => 'required|regex:/^[0-9]{4}$/',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $credentials = [
            'phone_number' => $request->phone_number,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
            'code' => $request->code,
        ];

        $response = Password::broker()->reset($credentials, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($response == Password::PASSWORD_RESET) {
            return response()->json([
                'message' => 'Password reset successful',
            ]);
        } else {
            return response()->json([
                'message' => 'Password reset failed',
            ], 422);
        }
    }
    private function sendVerificationCode($to, $token)
    {
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $from = config('services.twilio.from');

        $client = new Client($sid, $token);

        $message = 'Your verification code is: ' . substr($token, -4);

        $client->messages->create(
            $to,
            [
                'from' => $from,
                'body' => $message,
            ]
        );
    }
}
