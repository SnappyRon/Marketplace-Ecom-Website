<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active', // Added 'is_active' here
        'role', // New field for user role
        'store_name', // New field for seller store name
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean', // Added 'is_active' casting here
        ];
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'seller_id');
    }

    public function ordersAsBuyer()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function ordersAsSeller()
    {
        return $this->hasMany(Order::class, 'seller_id');
    }


    

}
