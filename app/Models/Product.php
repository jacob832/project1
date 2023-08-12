<?php
<<<<<<< HEAD
=======

>>>>>>> origin/master
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
=======
    protected $fillable=
    [
        'name',
        'description',
    ];
>>>>>>> origin/master
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
    public function isFavoriteByUser($userId)
{
    return $this->wishListItems()->where('user_id', $userId)->exists();
}
}
