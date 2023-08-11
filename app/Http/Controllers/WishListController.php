<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use App\Models\Variation;
use App\Models\WishListItems;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreWishListRequest;
use App\Http\Requests\UpdateWishListRequest;

class WishListController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlist = Auth::user()->wishList;
        $items = $wishlist->wishListItems;
        if($items->isempty()){
        return $this->returnError('','Not Found');
        } else
        return $this->returnData('Success WishList',$items);

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
     * @param  \App\Http\Requests\StoreWishListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWishListRequest $request)
    {
        $user = Auth::user();
        $product = Variation::findOrFail($request->product_id);
        $wishlist = $user->wishList ?? new WishList();
        $wishlist->user_id = $user->id;
        $wishlist->save();
        $wishlistItem = $wishlist->wishListItems()->where('variation_id', $product->id)->first() ??
         new WishListItems();
        $wishlistItem->variation_id = $product->id;
        $wishlistItem->wish_list_id = $wishlist->id;
        $wishlistItem->save();
        return $this->returnData('Item added to wishlist!',$wishlistItem);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function show(WishList $wishList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function edit(WishList $wishList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWishListRequest  $request
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWishListRequest $request, WishList $wishList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreWishListRequest $request)
    {
        $user = Auth::user();
        $product = Variation::findOrFail($request->product_id);
        $wishlist = $user->wishList;
        $wishlistItem = $wishlist->wishListItems()->where('variation_id', $product->id)->first();
        if ($wishlistItem) {
            $wishlistItem->delete();
            return $this->returnSuccessMessage('Item removed from wishlist!');
        }
        else{
            return $this->returnError('','Not Found');
        }

    }
}
