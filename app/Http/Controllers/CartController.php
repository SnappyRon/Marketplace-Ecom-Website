<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // Checkout the cart
    public function checkout(Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to checkout.');
        }

        // Check if the user is active
        $user = Auth::user();
        if (!$user->is_active) {
            return redirect()->back()->with('error', 'Your account is not active. Please contact support.');
        }

        // Retrieve the cart
        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Here, you can process the checkout logic, such as:
        // 1. Create an order in the database
        // 2. Deduct stock from inventory
        // 3. Clear the cart from the session

        // Example: Clear the cart
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Checkout successful! Your order has been placed.');
    }
}
