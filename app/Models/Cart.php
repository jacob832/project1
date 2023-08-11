<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts'; // اسم الجدول الذي تم تعريفه في قاعدة البيانات

    protected $fillable = [
        'user_id',
        // يمكنك إضافة المزيد من الأعمدة الأخرى التي ترغب في إدخال قيم لها عند إنشاء سلة هنا
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function variations()
    {
        return $this->belongsToMany(Variation::class,'cart_items');
    }
    public function items()
    {
        return $this->hasMany(CartItems::class);
    }
}
