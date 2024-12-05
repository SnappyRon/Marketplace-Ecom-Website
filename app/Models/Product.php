<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'price',
        'image',
        'supplier_name',
        'description',  // Optional: If you plan to add product descriptions
        'seller_id',    // New field to associate products with a seller
    ];

    /**
     * Relationship: Product belongs to a seller (User)
     */
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}


