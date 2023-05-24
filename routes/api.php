<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login_LogoutController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\ResetPasswordController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[RegisterController::class,'register']);
Route::post('login',[Login_LogoutController::class,'login']);
Route::post('forget_password',[ForgetPasswordController::class,'forgetPassword']);
Route::post('reset_password',[ResetPasswordController::class,'passwprdReset']);
//AuthUser
Route::middleware(['auth:sanctum'])->group(function(){
Route::get('/profile',function(Request $request){
    return $request->user();
}); 
Route::put('update_profile',[ProfileController::class,'updateProfile']);
Route::post('email_vrification',[EmailVerificationController::class,'email_vrification']);
Route::get('email_vrification',[EmailVerificationController::class,'sendEmailVerification']);
Route::post('logout',[Login_LogoutController::class,'logout'])->middleware('auth:sanctum');
});