<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function variations()
    {
        return $this->belongsToMany(Variation::class,'cart_items');
    }
    public function items()
    {
        return $this->hasMany(CartItems::class);
    }
}
