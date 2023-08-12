<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\ResetPassword;
=======
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
>>>>>>> origin/master

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
<<<<<<< HEAD
        'role_id',
        'name',
        'email',
=======
        'name',
        'gender',
>>>>>>> origin/master
        'password',
        'phone_number',
        'birth',
        'gender',
<<<<<<< HEAD
        'image',
=======
        'image'
>>>>>>> origin/master
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
<<<<<<< HEAD
        'password' => 'hashed',
=======
>>>>>>> origin/master
    ];
    public function wishList()
    {
        return $this->hasOne(WishList::class);
    }    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function address()
    {
        return $this->hasOne(Address::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
    
    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            if($user->role&&$user->role->name=='customer')
                $user->cart()->create();
                $user->wishList()->create();
        });
    }
<<<<<<< HEAD
=======
    
>>>>>>> origin/master
}
