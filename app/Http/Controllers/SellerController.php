<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\IsSeller;

class SellerController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Apply 'auth' and 'is_seller' middleware to seller-specific methods
        $this->middleware(['auth', IsSeller::class])->only('dashboard');

        // Apply 'guest' middleware to registration methods
        $this->middleware('guest')->only(['showRegistrationForm', 'register']);
    }

    /**
     * Show the seller registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('seller.register');
    }

    /**
     * Handle seller registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'store_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the seller
        $seller = User::create([
            'name' => $request->name,
            'store_name' => $request->store_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'seller',
        ]);

        // Log the seller in
        auth()->login($seller);

        // Redirect to seller dashboard
        return redirect()->route('seller.dashboard')->with('success', 'Registration successful.');
    }

    /**
     * Show the seller dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $sellerId = Auth::id();

        // Retrieve orders for the seller with pagination
        $orders = Order::where('seller_id', $sellerId)
            ->with('buyer', 'orderItems.product') // Eager load relationships
            ->orderBy('created_at', 'desc')
            ->paginate(5); // Paginate with 5 orders per page

        return view('seller.dashboard', compact('orders'));
    }

}
