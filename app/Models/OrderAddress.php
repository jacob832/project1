<?php

namespace App\Models;
<<<<<<< HEAD
=======

>>>>>>> origin/master
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = 'order_addresses';

    protected $fillable = [
        'street_address',
        'area',
        'city',
    ];
=======

    protected $fillable=[
        'street_address',
        'area',
        'city',
        ];

>>>>>>> origin/master
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
