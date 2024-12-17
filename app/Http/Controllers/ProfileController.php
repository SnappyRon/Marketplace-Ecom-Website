<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

// Import the models
use App\Models\Order;        // Order Model
use App\Models\OrderItem;    // OrderItem Model

class ProfileController extends Controller
{
    /**
     * Display the 'My Details' page.
     */
    public function details(Request $request): View
    {
        $user = $request->user();

        return view('profile.details', [
            'user' => $user,
        ]);
    }

    /**
     * Display the 'My Orders' page for buyers.
     */
    public function orders(Request $request): View
    {
        $user = $request->user();

        // Fetch orders only for buyers
        $orders = [];
        if ($user->role === 'buyer') {
            $orders = Order::with('orderItems.product')
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        

        foreach ($orders as $order) {
            foreach ($order->orderItems as $item) {
                // If product exists and has an image in the database
                if ($item->product && $item->product->image) {
                    $item->image = $item->product->image; // Use product image from database
                } else {
                    // Fallback to a default image
                    $item->image = 'product-default.png';
                }
            }
        }

        // Add store name dynamically
        foreach ($orders as $order) {
            $order->store_name = $order->seller && $order->seller->store_name
            ? $order->seller->store_name
            : 'Unknown Store';
        }
    
        return view('profile.orders', compact('orders'));
    }

    /**
     * Update the status of an order to 'Received'.
     */
    public function updateOrderStatus(Request $request, Order $order): RedirectResponse
    {
        $user = $request->user();

        // Check if the logged-in user is the buyer of the order
        if ($order->user_id !== $user->id) {
            return back()->with('error', 'Unauthorized action.');
        }

        // Update order status to 'Received'
        $order->status = 'received';
        $order->save();

        return back()->with('success', 'Order status updated to Received.');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update basic profile details
        $user->fill($request->validated());

        // If email has changed, reset email verification
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.details')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile image.
     */
    public function updateProfileImage(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        $user = $request->user();

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');

            // Delete the old image if it exists
            if ($user->profile_image && file_exists(public_path($user->profile_image))) {
                unlink(public_path($user->profile_image));
            }

            $user->profile_image = '/storage/' . $imagePath;
            $user->save();
        }

        return back()->with('success', 'Profile image updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
