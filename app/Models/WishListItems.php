<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishListItems extends Model
{
    use HasFactory;
    
    public function wishList()
    {
        return $this->belongsTo(WishList::class);
    }
    public function variations()
    {
        return $this->belongsTo(Variation::class);
    }
}
