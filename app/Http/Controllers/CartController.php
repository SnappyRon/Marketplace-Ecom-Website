<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Show the cart
    public function index()
    {
        // Get the cart from the session
        $cartItems = session()->get('cart', []);

        // Calculate total price for the cart
        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));

        return view('cart.index', compact('cartItems', 'total'));
    }

    // Add a product to the cart
    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        // Get the cart from the session
        $cart = session()->get('cart', []);

        // Check if the product already exists in the cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }

        // Save the cart back to the session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // Update cart item quantity
    public function update(Request $request, $cartItemId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$cartItemId])) {
            $cart[$cartItemId]['quantity'] = $request->quantity;
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Cart updated!');
    }

    // Remove a cart item
    public function remove($cartItemId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$cartItemId])) {
            unset($cart[$cartItemId]);
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product removed from cart!');
    }
    
}
