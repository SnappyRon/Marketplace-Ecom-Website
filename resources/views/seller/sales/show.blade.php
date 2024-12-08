{{-- resources/views/seller/sales/show.blade.php --}}
<x-app-layout>
    <x-slot name="title">Order Details</x-slot>

    <section class="order-details-section">
        <h2>Order #{{ $order->id }}</h2>

        <div class="order-info">
            <p><strong>Buyer Name:</strong> {{ $order->full_name }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Phone Number:</strong> {{ $order->phone_number }}</p>
            <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
            <p><strong>City:</strong> {{ $order->city }}</p>
            <p><strong>State/Province:</strong> {{ $order->state }}</p>
            <p><strong>Postal Code:</strong> {{ $order->postal_code }}</p>
            <p><strong>Country:</strong> {{ $order->country }}</p>
            <p><strong>Total Amount:</strong> ₱{{ number_format($order->total_amount, 2) }}</p>
            <p><strong>Status:</strong> {{ $order->status }}</p>
            <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
        </div>

        <h3>Order Items</h3>
        <table class="order-items-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>₱{{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>₱{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Add actions like updating order status if needed -->
        <div class="update-status">
            <h3>Update Order Status</h3>

            <form action="{{ route('seller.sales.updateStatus', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                    <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>

                <button type="submit" class="update-status-btn">Update Status</button>
            </form>
        </div>
    </section>

    <!-- Optional: Add some basic styles for better presentation -->
    <style>
        .order-details-section {
            padding: 20px;
        }

        .order-info p {
            margin: 5px 0;
        }

        .order-items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .order-items-table th, .order-items-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .order-items-table th {
            background-color: #f4f4f4;
        }

        .update-status {
            margin-top: 20px;
        }

        .update-status label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .update-status select {
            padding: 8px;
            width: 200px;
            margin-bottom: 10px;
        }

        .update-status-btn {
            padding: 8px 16px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-status-btn:hover {
            background-color: #218838;
        }
    </style>
</x-app-layout>
