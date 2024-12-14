<x-app-layout>
    <x-slot name="title">Your Sales</x-slot>

    <!-- Dashboard Wrapper -->
    <div style="display: flex; min-height: 100vh; font-family: Arial, sans-serif; background-color: #ffffff; color: #333;">

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
        <main style="flex: 1; padding: 20px; background-color: #f4f4f4;">
            <!-- Header -->
            <header style="margin-bottom: 20px;">
                <h1 style="margin: 0; color: #5e5359;">Your Sales</h1>
            </header>

            <!-- Sales Section -->
            <section style="background: #ffffff; padding: 20px; border: 1px solid #5e5359; border-radius: 10px;">
                @if ($orders->isEmpty())
                    <p style="color: #888;">You have no sales yet.</p>
                @else
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                        <thead>
                            <tr style="background: #5e5359; color: #ffffff;">
                                <th style="padding: 10px;">Order ID</th>
                                <th style="padding: 10px;">Buyer Name</th>
                                <th style="padding: 10px;">Email</th>
                                <th style="padding: 10px;">Phone Number</th>
                                <th style="padding: 10px;">Shipping Address</th>
                                <th style="padding: 10px;">City</th>
                                <th style="padding: 10px;">State/Province</th>
                                <th style="padding: 10px;">Postal Code</th>
                                <th style="padding: 10px;">Country</th>
                                <th style="padding: 10px;">Total Amount</th>
                                <th style="padding: 10px;">Status</th>
                                <th style="padding: 10px;">Order Date</th>
                                <th style="padding: 10px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr style="background: #f4f4f4;">
                                    <td style="padding: 10px;">#{{ $order->id }}</td>
                                    <td style="padding: 10px;">{{ $order->full_name }}</td>
                                    <td style="padding: 10px;">{{ $order->email }}</td>
                                    <td style="padding: 10px;">{{ $order->phone_number }}</td>
                                    <td style="padding: 10px;">{{ $order->shipping_address }}</td>
                                    <td style="padding: 10px;">{{ $order->city }}</td>
                                    <td style="padding: 10px;">{{ $order->state }}</td>
                                    <td style="padding: 10px;">{{ $order->postal_code }}</td>
                                    <td style="padding: 10px;">{{ $order->country }}</td>
                                    <td style="padding: 10px;">₱{{ number_format($order->total_amount, 2) }}</td>
                                    <td style="padding: 20px;">
                                        <span style="padding: 5px 10px; border-radius: 4px; font-weight: bold; color: #ffffff; background-color: 
                                            {{ strtolower($order->status) === 'pending' ? '#ffc107' : 
                                               (strtolower($order->status) === 'processing' ? '#17a2b8' : 
                                               (strtolower($order->status) === 'shipped' ? '#28a745' : 
                                               (strtolower($order->status) === 'completed' ? '#007bff' : '#dc3545'))) }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td style="padding: 10px;">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                    <td style="padding: 10px; text-align: center;">
                                        <a href="{{ route('seller.sales.show', $order->id) }}" 
                                        style="padding: 10px 20px; background-color: #887983; color: #ffffff; text-decoration: underline; border: none; border-radius: 4px; cursor: pointer; display: inline-block;">
                                        View Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div style="text-align: center;">
                        {{ $orders->links() }}
                    </div>
                @endif
            </section>
        </main>
    </div>
</x-app-layout>
