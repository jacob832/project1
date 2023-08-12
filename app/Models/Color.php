<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
<<<<<<< HEAD

    protected $table = 'colors';

    protected $fillable = [
        'name',
        'hex_code',
    ];

    public $timestamps = true;
=======
    protected $fillable=['name','hex_code',];

>>>>>>> origin/master
    public function variations()
    {
       return $this->hasMany(Variation::class);
    }
}
