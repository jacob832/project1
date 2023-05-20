<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;

    protected $fillable=[
        'street_address',
        'area',
        'city',
        ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
