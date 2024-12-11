<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

class CartController extends Controller
{
    // Show the cart
    public function index()
    {
        // Get the cart from the session
        $cartItems = session()->get('cart', []);

        // Calculate total price for the cart
        $total = $this->calculateTotal($cartItems);

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

    // Show Checkout Form
    public function showCheckoutForm()
    {
        // Get the cart from the session
        $cartItems = session()->get('cart', []);

        // Calculate total price for the cart
        $total = $this->calculateTotal($cartItems);

        return view('cart.checkout', compact('cartItems', 'total'));
    }

    // Checkout the cart
    public function checkout(Request $request)
    {
        // Validate the request
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'shipping_address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
        ]);

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

        // Begin Transaction
        DB::beginTransaction();

        try {
            // For simplicity, assume all products are from the same seller
            // If multiple sellers are involved, you'd need to create separate orders per seller

            // Retrieve the first seller_id from cart items
            $firstProduct = Product::findOrFail(array_key_first($cartItems));
            $sellerId = $firstProduct->seller_id; // Ensure your Product model has seller_id

            // Create Order
            $order = Order::create([
                'user_id' => $user->id,
                'seller_id' => $sellerId,
                'total_amount' => $this->calculateTotal($cartItems),
                'shipping_address' => $request->shipping_address,
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'country' => $request->country,
                'status' => 'Pending',
            ]);

            // Create Order Items
            foreach ($cartItems as $productId => $item) {
                $product = Product::findOrFail($productId);

                // Ensure all products are from the same seller
                if ($product->seller_id !== $sellerId) {
                    throw new \Exception('All products in the cart must be from the same seller.');
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                // Optionally, deduct stock
                // $product->decrement('stock', $item['quantity']);
            }

            // Clear the cart
            session()->forget('cart');

            // Commit Transaction
            DB::commit();

            // Send Order Confirmation Email to Seller
            Mail::to($order->seller->email)->send(new OrderConfirmation($order));

            // Send Order Confirmation Email to Buyer
            Mail::to($order->buyer->email)->send(new OrderConfirmation($order));

            return redirect()->route('home')->with('success', 'Checkout successful! Your order has been placed.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Log the error for debugging
            \Log::error('Checkout Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred during checkout. Please try again.');
        }
    }

    /**
     * Calculate the total amount for the cart items.
     *
     * @param array $cartItems
     * @return float
     */
    private function calculateTotal($cartItems)
    {
        return array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));
    }
}
