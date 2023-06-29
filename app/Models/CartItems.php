<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'price',
        'quantity',
        'variation_id'
        
    ];
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
}
