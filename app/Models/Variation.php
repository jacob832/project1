<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $table = 'variations';

    protected $fillable = [
        'product_id',
        'color_id',
        'quantity',
        'price',
        'size',
        
    ];

    public function reviews()
{
    return $this->hasMany(Review::class);
}
public function discount()
    {
        return $this->hasMany(Discount::class);
    }

    public function products()
    {
       return $this->belongsTo(Product::class);
    }
    public function color()
    {
        return$this->belongsTo(Color::class);
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class,'cart_items');
    }

    public function items()
    {
        return $this->hasMany(CartItems::class);
    }
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function order()
    {
        return $this->belongsToMany(Order::class,'order_items');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }
   
    public function wishList()
    {
        return $this->belongsToMany(WishList::class,'wish_list_items');
    }
    public function wishListItems()
    {
        return $this->hasMany(WishListItems::class);
    }

}
