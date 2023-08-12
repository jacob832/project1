<?php

namespace App\Models;
<<<<<<< HEAD
=======

>>>>>>> origin/master
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
<<<<<<< HEAD
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
=======
    use HasFactory;
    protected $fillable=['total_amount','status'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    } 
    
    public function address()
    {
        return $this->belongsTo(OrderAddress::class);
>>>>>>> origin/master
    }
    public function variations()
    {
        return $this->belongsToMany(Variation::class,'order_items');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }
<<<<<<< HEAD
=======
     
>>>>>>> origin/master
}
