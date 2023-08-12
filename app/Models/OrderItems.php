<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable=[
        'variation_id',
        'order_id',
        'price',
        'quantity',
        'total_price',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function variations()
    {
        return $this->belongsTo(Variation::class);
    }
}
