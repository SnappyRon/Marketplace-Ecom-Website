<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class SellerSalesController extends Controller
{
    public function index()
    {

        $sellerId = Auth::id();

        // Retrieve orders where the seller is the owner
        $orders = Order::where('seller_id', $sellerId)
            ->with('buyer', 'orderItems.product')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        // Replace this with your logic for fetching and displaying sales data
        return view('seller.sales.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Ensure the order belongs to the seller
        if ($order->seller_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $order->load('buyer', 'orderItems.product');

        return view('seller.sales.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        // Ensure the order belongs to the seller
        if ($order->seller_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validate the request
        $request->validate([
            'status' => 'required|string|in:Pending,Processing,Shipped,Completed,Cancelled',
        ]);

        // Update the status
        $order->status = $request->status;
        $order->save();

        

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

}