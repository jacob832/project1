<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'order_address_id',
        'total_amount',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'order_address_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function variations()
    {
        return $this->belongsToMany(Variation::class,'order_items');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }
}
