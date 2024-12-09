<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}