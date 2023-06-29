<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItems;
use App\Models\Variation;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

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

        // Check if the quantity is greater than zero and less than or equal to the quantity in the Variation table
        if ($request->quantity > 0 && $request->quantity <= $variation->quantity) {

            if ($item) {
                // If the item already exists in the cart, update the quantity and price
                $item->quantity += $request->quantity;
                $item->price = $item->quantity * $variation->price;
                $item->save();
            } else {
                // If the item doesn't exist in the cart, create a new item
                $item = new CartItems([
                    'quantity' => $request->quantity,
                    'price' => $request->quantity * $variation->price,
                    'variation_id' => $request->variation_id,
                ]);
                $cart->items()->save($item);
            }

            
            $cartItems = $cart->items;
            $totalPrice = $cartItems->sum('price');
            // Update the quantity of the product in the Variation table
            $variation->decrement('quantity', $request->quantity);

            return $this->returnData('Product added to cart successfully', [
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
            ]);
        } else {
            // Return error message if the quantity is not valid
            return $this->returnError(
                'Quantity Error',
                'Failed to add product to cart. The quantity requested is greater than the available quantity.'
            );
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
        
                // Update the quantity of the product in the Variation table
                $item->variation->increment('quantity', $item->quantity);
        
                // Delete the item from the cart
                $item->delete();
        
                $cart = auth()->user()->cart;
                $cartItems = $cart->items;
                $totalPrice = $cartItems->sum('price');
                return $this->returnData('Cart item deleted successfully', [
                    'cartItems' => $cartItems,
                    'totalPrice' => $totalPrice,
                ]);
            }

            /*public function destroy(Cart $cart, Product $product)
            {
                // Check if the product exists in the cart
                $item = $cart->items()->where('variation_id', $product->default_variation_id)->first();
                if (!$item) {
                    return $this->returnError(
                        'Item not found',
                        'Failed to remove item from cart. The item does not exist in the cart.'
                    );
                }
            
                // Update the quantity of the product in the Variation table
                $variation = $item->variation;
                $variation->increment('quantity', $item->quantity);
            
                // Remove the item from the cart
                $item->delete();
            
                $cartItems = $cart->items;
                $totalPrice = $cartItems->sum('price');
            
                return $this->returnData('Product removed from cart successfully', [
                    'cartItems' => $cartItems,
                    'totalPrice' => $totalPrice,
                ]);
            }*/
}

