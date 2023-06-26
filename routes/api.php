<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\Login_LogoutController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\ProfileController;

Route::post('register', [RegisterController::class,'register']);
Route::post('login',    [Login_LogoutController::class,'login']);
//Route::post('passwordreset',[ForgetPasswordController::class,'sendResetLink']);
//Route::post('password/reset/verify',[ForgetPasswordController::class,'resetPassword']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('logout',           [Login_LogoutController::class,'logout']);
    Route::post('insert_addresses', [AddressController::class,'insert_address']);
    Route::get('get_address',       [AddressController::class,'get_address']);
    Route::put('update_profile',    [ProfileController::class,'updateProfile']);
    });
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
