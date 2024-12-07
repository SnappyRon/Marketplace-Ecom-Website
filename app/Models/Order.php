<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'seller_id',
        'total_amount',
        'shipping_address',
        'full_name',
        'phone_number',
        'email',
        'city',
        'state',
        'postal_code',
        'country',
        'status',
    ];

    // Buyer
    public function buyer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Seller
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    // Order Items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
