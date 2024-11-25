<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch a limited number of products for the home page
        $products = Product::take(value: 8)->get(); // Adjust the limit as needed

        // Pass products to the home view
        return view('home', compact('products'));
    }

    
}
