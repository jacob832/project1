<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Variation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Traits\GeneralTrait;

class CartController extends Controller
{
    use GeneralTrait;
    
    /**
     * Display the items in the user's cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $cart = $user->cart;
        $items = $cart->items;
        if(!$items){
            return $this->returnError('','No thing');
        }
        return $this->returnData('items cart',$items);
        
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        $user = Auth::user();
        $cart = $user->cart;
        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->save();
        }
        $variation = Variation::find($request->variation_id);
        $price = $variation->price;
        $quantity = $request->quantity;
        $cartItem = $cart->items()->where('variation_id', $variation->id)->first();

        if ($quantity > $variation->quantity) {
            return $this->returnError('','Failed to add product to cart. Quantity requested is greater than available quantity.');
        }
        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            $cartItem = new CartItems();
            $cartItem->cart_id = $cart->id;
            $cartItem->variation_id = $variation->id;
            $cartItem->price = $price;
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }
        $variation->decrement('quantity', $quantity);
         if (!$cartItem) {
            return $this->returnError('','Failed to add product to cart');
        }
        else  
            return $this->returnData('Product added to cart successfully',$cartItem);

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
    $cart = $user->cart;
    $item = CartItems::find($id);

    if (!$cart || !$item || $item->cart_id != $cart->id) {
        return response()->json(['message' => 'Failed to remove item from cart']);
    }

    $variation = $item->variation;
    if ($variation) {
        $variation->increment('quantity', $item->quantity);
    }
    $item->delete();

    return response()->json(['message' => 'Item removed from cart successfully']);
    }
}
