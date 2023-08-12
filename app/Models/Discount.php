<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = 'discounts';


    protected $fillable = [
        'variation_id',
=======
    protected $fillable=
    [
>>>>>>> origin/master
        'start_date',
        'end_date',
        'discount',
    ];
<<<<<<< HEAD

    // Define the relationship between Discount and Variation (assuming Variation model exists)
    public function variation()
    {
        return $this->belongsTo(Variation::class);
    }
=======
    public function variations()
    {
        $this->belongsTo(Variation::class);
    }
    
>>>>>>> origin/master
}
