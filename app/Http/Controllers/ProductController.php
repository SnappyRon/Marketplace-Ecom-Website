<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the product details page.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id); // Fetch product by ID
        return view('product.details', compact('product')); // Pass product to the view
    }
    public function index()
{
    $products = Product::all(); // Fetch all products
    return view('shop', compact('products'));
}
}
