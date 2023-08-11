<?php

namespace App\Http\Controllers;

use App\Models\CartItems;
use App\Http\Requests\StoreCartItemsRequest;
use App\Http\Requests\UpdateCartItemsRequest;

class CartItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCartItemsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartItemsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartItems  $cartItems
     * @return \Illuminate\Http\Response
     */
    public function show(CartItems $cartItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartItems  $cartItems
     * @return \Illuminate\Http\Response
     */
    public function edit(CartItems $cartItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartItemsRequest  $request
     * @param  \App\Models\CartItems  $cartItems
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartItemsRequest $request, CartItems $cartItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartItems  $cartItems
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartItems $cartItems)
    {
        //
    }
}
