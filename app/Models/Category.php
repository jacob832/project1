<?php

namespace App\Models;
<<<<<<< HEAD
=======

>>>>>>> origin/master
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = 'categories';

    protected $fillable = [
        'parent_id',
        'name',
=======
    protected $fillable=[
        'name',

>>>>>>> origin/master
    ];

    public function parent()
    {
<<<<<<< HEAD
        return $this->belongsTo(Category::class, 'parent_id');
=======
        return $this->belongsTo(Category::class,'parent_id');
>>>>>>> origin/master
    }

    public function children()
    {
<<<<<<< HEAD
        return $this->hasMany(Category::class, 'parent_id');
    }
=======
        return $this->hasMany(Category::class,'parent_id');
    }
    
    
>>>>>>> origin/master
}
