<x-app-layout>
    <x-slot name="title">Order Details</x-slot>

    <!-- Dashboard Wrapper -->
    <div style="display: flex; min-height: 100vh; font-family: Arial, sans-serif; background-color: #f4f4f4;">

        <!-- Sidebar -->
        <aside style="width: 250px; background: #352f33; color: #ffffff; padding: 20px; display: flex; flex-direction: column; gap: 20px;">
            <!-- Logo -->
            <div style="font-size: 24px; font-weight: bold; text-align: center; margin-bottom: 20px;">Your Logo</div>

            <!-- Navigation Menu -->
            <nav>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;">
                        <a href="{{ route('seller.dashboard') }}" style="color: #ffffff; text-decoration: none; display: flex; align-items: center; gap: 10px;">
                            🏠 Dashboard
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;"><a href="{{ route('seller.products.index') }}" style="color: #ffffff; text-decoration: none; display: flex; align-items: center; gap: 10px;">📦 Manage Products</a></li>
                    <li style="margin-bottom: 10px;"><a href="{{ route('seller.sales') }}" style="color: #ffffff; text-decoration: none; display: flex; align-items: center; gap: 10px;">📊 View Sales</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" style="color: #ffffff; text-decoration: none; display: flex; align-items: center; gap: 10px;">⚙️ Settings</a></li>
                    <li style="margin-top: 20px;">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; color: #ffffff; border: none; cursor: pointer; display: flex; align-items: center; gap: 10px;">🔓 Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main style="flex: 1; margin: 20px; padding: 20px; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <!-- Order Info -->
            <section style="padding: 20px; border: 1px solid #5e5359; border-radius: 10px; margin-bottom: 20px;">
                <h2 style="margin: 0 0 20px; color: #5e5359;">Order Information</h2>
                <div>
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
            </section>

            <!-- Order Items Section -->
            <section style="padding: 20px; border: 1px solid #5e5359; border-radius: 10px; margin-bottom: 20px;">
                <h2 style="margin: 0 0 20px; color: #5e5359;">Order Items</h2>
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <thead>
                        <tr style="background: #5e5359; color: #ffffff;">
                            <th style="padding: 10px; text-align: left;">Product</th>
                            <th style="padding: 10px; text-align: left;">Price</th>
                            <th style="padding: 10px; text-align: left;">Quantity</th>
                            <th style="padding: 10px; text-align: left;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr style="background: #f4f4f4;">
                                <td style="padding: 10px;">{{ $item->product->name }}</td>
                                <td style="padding: 10px;">₱{{ number_format($item->price, 2) }}</td>
                                <td style="padding: 10px;">{{ $item->quantity }}</td>
                                <td style="padding: 10px;">₱{{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

            <!-- Update Status -->
            <section style="padding: 20px; border: 1px solid #5e5359; border-radius: 10px;">
                <h2 style="margin: 0 0 20px; color: #5e5359;">Update Order Status</h2>
                <form action="{{ route('seller.sales.updateStatus', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="status" style="display: block; margin-bottom: 10px; font-weight: bold;">Status:</label>
                    <select name="status" id="status" style="padding: 8px; width: 100%; margin-bottom: 20px;" required>
                        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                        <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <button type="submit" style="padding: 10px 20px; background-color: #5e5359; color: #ffffff; border: none; border-radius: 4px; cursor: pointer;">Update Status</button>
                </form>
            </section>
        </main>
    </div>
</x-app-layout>
