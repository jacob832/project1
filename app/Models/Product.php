<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'name',
        'description',
    ];
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
}
