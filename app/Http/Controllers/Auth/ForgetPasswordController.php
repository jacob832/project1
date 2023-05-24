<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use App\Models\User;
use App\Notifications\ResetPasswordVerificationNotification;

class ForgetPasswordController extends Controller
{
    use GeneralTrait;
    public function forgetPassword(ForgetPasswordRequest $request){
    
        $input=$request->only('email');
        $user=User::where('email',$input)->first();
        $user->notify(new ResetPasswordVerificationNotification());
        return $this->returnSuccessMessage('Verification code has been sent. Check your mailbox');
    }
}
