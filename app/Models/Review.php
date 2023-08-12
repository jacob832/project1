<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = 'reviews';
    protected $fillable = [
        'user_id',
        'variation_id',
        'rating',
        'comment',
    ];

    // تعريف العلاقة بين الريفيو وجدول المستخدمين (User)
=======

    protected $fillable=
    [
        'rating',
        'comment',
    ];
    
>>>>>>> origin/master
    public function user()
    {
        return $this->belongsTo(User::class);
    }
<<<<<<< HEAD

    // تعريف العلاقة بين الريفيو وجدول التفاصيل الخاصة بالمنتج (Variation)
    public function variation()
=======
    public function variations()
>>>>>>> origin/master
    {
        return $this->belongsTo(Variation::class);
    }
}
