<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function variations()
    {
        return $this->belongsToMany(Variation::class,'wish_list_items');
    }
    public function wishListItems()
    {
        return $this->hasMany(WishListItems::class);
    }
}
