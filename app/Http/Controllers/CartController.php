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
    // 
    
    public function checkout(Request $request)
    {
        // Validate input fields
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'shipping_address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
        ]);

        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to checkout.');
        }

        // Fetch user details
        $user = Auth::user();
        if (!$user->is_active) {
            return redirect()->back()->with('error', 'Your account is not active. Please contact support.');
        }

        // Retrieve cart items from the session
        $cartItems = session()->get('cart', []);
        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate the total amount
        $totalAmount = $this->calculateTotal($cartItems);

        // Begin database transaction
        DB::beginTransaction();

        try {
            // Determine seller_id from the first product
            $firstProductId = array_key_first($cartItems);
            $firstProduct = Product::findOrFail($firstProductId);
            $sellerId = $firstProduct->seller_id;

            // Create the order
            $order = Order::create([
                'user_id' => $user->id,
                'seller_id' => $sellerId,
                'total_amount' => $totalAmount,
                'shipping_address' => $validated['shipping_address'],
                'full_name' => $validated['full_name'],
                'phone_number' => $validated['phone_number'],
                'email' => $validated['email'],
                'city' => $validated['city'],
                'state' => $validated['state'],
                'postal_code' => $validated['postal_code'],
                'country' => $validated['country'],
                'status' => 'Pending',
            ]);

            // Create the order items
            foreach ($cartItems as $productId => $item) {
                $product = Product::findOrFail($productId);

                // Ensure all products are from the same seller
                if ($product->seller_id !== $sellerId) {
                    throw new \Exception('All products in the cart must be from the same seller.');
                }

                $order->orderItems()->create([
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                // Optionally, reduce product stock
                // $product->decrement('stock', $item['quantity']);
            }

            // Clear the cart session
            session()->forget('cart');

            // Commit the transaction
            DB::commit();

            // Notify seller and buyer via email
            Mail::to($order->seller->email)->send(new OrderConfirmation($order));
            Mail::to($order->buyer->email)->send(new OrderConfirmation($order));

            return redirect()->route('home')->with('success', 'Checkout successful! Your order has been placed.');
        } catch (\Exception $e) {
            DB::rollBack();
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
