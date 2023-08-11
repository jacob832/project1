<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    protected $table = 'cart_items';
    protected $fillable = ['cart_id', 'variation_id', 'price', 'quantity'];
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
    // If you want to include the created_at and updated_at columns, you don't need to add them here as they are included by default.

    // You can define any relationships or additional methods here if needed.
}
