<?php

namespace App\Models;
<<<<<<< HEAD
=======

>>>>>>> origin/master
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
<<<<<<< HEAD
    protected $table = 'cart_items';
    protected $fillable = ['cart_id', 'variation_id', 'price', 'quantity'];
=======
    use HasFactory;
    protected $fillable=
    [
        'price',
        'quantity',
        'variation_id'
        
    ];
>>>>>>> origin/master
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
<<<<<<< HEAD
    // If you want to include the created_at and updated_at columns, you don't need to add them here as they are included by default.

    // You can define any relationships or additional methods here if needed.
=======
>>>>>>> origin/master
}
