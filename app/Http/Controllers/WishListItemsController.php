<?php

namespace App\Http\Controllers;

use App\Models\WishListItems;
use App\Http\Requests\StoreWishListItemsRequest;
use App\Http\Requests\UpdateWishListItemsRequest;

class WishListItemsController extends Controller
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
     * @param  \App\Http\Requests\StoreWishListItemsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWishListItemsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WishListItems  $wishListItems
     * @return \Illuminate\Http\Response
     */
    public function show(WishListItems $wishListItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WishListItems  $wishListItems
     * @return \Illuminate\Http\Response
     */
    public function edit(WishListItems $wishListItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWishListItemsRequest  $request
     * @param  \App\Models\WishListItems  $wishListItems
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWishListItemsRequest $request, WishListItems $wishListItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WishListItems  $wishListItems
     * @return \Illuminate\Http\Response
     */
    public function destroy(WishListItems $wishListItems)
    {
        //
    }
}
