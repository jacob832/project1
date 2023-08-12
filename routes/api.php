<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\Login_LogoutController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\WishListItemsController;
use App\Http\Controllers\OrderController;

Route::post('register', [RegisterController::class,'register']);
Route::post('login',[Login_LogoutController::class,'login']);
Route::get('get_category',[CategoryController::class,'get_category']);
Route::get('get_product/{parent_id}',[ProductController::class,'get_product']);
Route::get('show_variation/{id}',[VariationController::class,'show']);
Route::get('show_color/{variation_id}',[ColorController::class,'show']);
Route::get('show_images/{id}',[ImageController::class,'showProductImages']);
Route::get('get_discounts/{id}',[DiscountController::class,'getDiscounts']);
Route::get('search',[ProductController::class,'search']);
Route::get('filter',[VariationController::class,'filter']);

//////////////////////////////////////////////////////////////
Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('logout',[Login_LogoutController::class,'logout']);
    Route::post('insert_addresses',[AddressController::class,'insert_address']);
    Route::get('get_address',[AddressController::class,'get_address']);
    Route::put('update_profile',[ProfileController::class,'updateProfile']);
    Route::post('add_to_cart',[CartController::class,'store']);
    Route::get('show_cart_items',[CartController::class,'index']);
    Route::post('delete_item/{cartItemId}',[CartController::class,'destroy']);
    Route::get('get_wishlist',[WishListController::class,'index']);
    Route::post('add_to_wishlist',[WishListController::class,'store']);
    Route::post('delete_item_wishlist',[WishListController::class,'destroy']);
    Route::post('add_review/{variation_id}',[ReviewController::class,'store']);
    Route::get('get_review/{variation_id}',[ReviewController::class,'index']);
    Route::post('orders',[OrderController::class,'store']);
    });
    Route::post('add_product',[ProductController::class,'add_product']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

