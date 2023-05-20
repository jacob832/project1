<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['total_amount','status'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    } 
    
    public function address()
    {
        return $this->belongsTo(OrderAddress::class);
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
