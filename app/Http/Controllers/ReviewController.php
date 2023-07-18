<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use App\Models\Variation;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Traits\GeneralTrait;

class ReviewController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($variation_id)
{
    $variation = Variation::findOrFail($variation_id);
    $reviews = $variation->reviews;
    $total_rating = 0;
    $count = 0;
    foreach ($reviews as $review) {
        $total_rating += $review->rating;
        $count++;
    }
    $average_rating = $count > 0 ? $total_rating / $count : 0;
    $average_rating_percentage = $average_rating / 5 * 100;
    return $this->returnData('', [
        'reviews' => $reviews,
        'average_rating_percentage' => $average_rating_percentage,
    ], 200);
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
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request, $variation_id)
    {
        $review = new Review;
        $review->user_id = auth()->user()->id;
        $review->variation_id = $variation_id;
        $review->rating = $request['rating'];
        $review->comment = $request['comment'];
        $review->save();
        return $this->returnSuccessMessage('Review created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
