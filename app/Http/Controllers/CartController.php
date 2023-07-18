<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Variation;
use App\Http\Traits\GeneralTrait;
use App\Http\Requests\StoreCartRequest;

class CartController extends Controller
{
    use GeneralTrait;

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $cart = $user->cart;
        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id]);
        }
        $cartItems = $cart->items;
        $totalPrice = $cartItems->sum('price');
        return $this->returnData('Cart retrieved successfully', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        $cart = auth()->user()->cart;
        $variation = Variation::findOrFail($request->variation_id);
        $item = $cart->items()->where('variation_id', $variation->id)->first();
        if ($request->quantity > 0 && $request->quantity <= $variation->quantity) {
            if ($item) {
                $item->quantity += $request->quantity;
                $item->price = $item->quantity * $variation->price;
                $item->save();
            } else {
                $item = new CartItems([
                    'quantity' => $request->quantity,
                    'price' => $request->quantity * $variation->price,
                    'variation_id' => $request->variation_id,
                ]);
                $cart->items()->save($item);
            }
            $cartItems = $cart->items;
            $totalPrice = $cartItems->sum('price');
            $variation->decrement('quantity', $request->quantity);
            return $this->returnData('Product added to cart successfully', [
                'cartItems' => $cartItems,'totalPrice' => $totalPrice]);
        } else {
            return $this->returnError(
                'Quantity Error','Failed to add product to cart. ');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @param  \App\Models\CartItems  $item
     * @return \Illuminate\Http\Response
            */
           
            
            public function destroy($id)
            {
                $item = CartItems::findOrFail($id);
                $item->variation->increment('quantity', $item->quantity);
                $item->delete();
                $cart = auth()->user()->cart;
                $cartItems = $cart->items;
                $totalPrice = $cartItems->sum('price');
                return $this->returnData('Cart item deleted successfully', [
                    'cartItems' => $cartItems,
                    'totalPrice' => $totalPrice,
                ]);
            }

            
}

