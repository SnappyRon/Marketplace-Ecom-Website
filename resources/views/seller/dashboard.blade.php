<x-app-layout>
    <x-slot name="title">Seller Dashboard</x-slot>

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
                <h1 style="margin: 0; color: #5e5359;">Welcome, {{ Auth::user()->name }}</h1>
                <p style="margin: 0; color: #888;">Your Store: {{ Auth::user()->store_name ?? 'No Store Name Set' }}</p>
            </header>

            <!-- Metrics Section -->
            <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                <div style="background: #ffffff; flex: 1; padding: 20px; border: 1px solid #5e5359; border-radius: 10px;">
                    <h3 style="margin: 0; font-size: 18px; color: #5e5359;">Avg. Selling Price</h3>
                    <p style="font-size: 24px; margin: 5px 0; color: #333;">$121.10</p>
                    <span style="color: #66bb6a;">+9.82%</span>
                </div>
                <div style="background: #ffffff; flex: 1; padding: 20px; border: 1px solid #5e5359; border-radius: 10px;">
                    <h3 style="margin: 0; font-size: 18px; color: #5e5359;">Avg. Clicks</h3>
                    <p style="font-size: 24px; margin: 5px 0; color: #333;">1912</p>
                    <span style="color: #e57373;">-51.71%</span>
                </div>
                <div style="background: #ffffff; flex: 1; padding: 20px; border: 1px solid #5e5359; border-radius: 10px;">
                    <h3 style="margin: 0; font-size: 18px; color: #5e5359;">Avg. Impressions</h3>
                    <p style="font-size: 24px; margin: 5px 0; color: #333;">120,192</p>
                    <span style="color: #e57373;">-43.71%</span>
                </div>
            </div>

            <!-- Order Overview Section -->
            <div style="background: #ffffff; padding: 20px; border: 1px solid #5e5359; border-radius: 10px; margin-bottom: 20px;">
                <h3 style="margin: 0; color: #5e5359;">Overview Order</h3>
                <canvas id="orderChart" style="width: 100%; height: 200px;"></canvas>
            </div>

            <!-- Orders List -->
            <!-- Orders List -->
                <div style="background: #ffffff; padding: 20px; border: 1px solid #5e5359; border-radius: 10px;">
                    <h3 style="margin: 0; color: #5e5359;">Orders</h3>
                    @if ($orders->isEmpty())
                        <p style="color: #888; margin-top: 10px;">You have no orders yet.</p>
                    @else
                        <table style="width: 100%; margin-top: 10px; color: #333; border-collapse: collapse; text-align: left;">
                            <thead>
                                <tr style="background: #5e5359; color: #ffffff;">
                                    <th style="padding: 10px;">No</th>
                                    <th style="padding: 10px;">Order Number</th>
                                    <th style="padding: 10px;">Product</th>
                                    <th style="padding: 10px;">Status</th>
                                    <th style="padding: 10px;">Date</th>
                                    <th style="padding: 10px;">Buyer</th>
                                    <th style="padding: 10px; text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr style="background: {{ $index % 2 == 0 ? '#f4f4f4' : '#ffffff' }};">
                                        <td style="padding: 10px;">{{ $index + 1 }}</td>
                                        <td style="padding: 10px;">{{ $order->id }}</td>
                                        <td style="padding: 10px;">
                                            {{ optional($order->orderItems->first())->product->name ?? 'N/A' }}
                                        </td>
                                        <td style="padding: 10px;">
                                            <span style="padding: 5px 10px; border-radius: 4px; font-weight: bold; color: #ffffff; background-color: 
                                                {{ strtolower($order->status) === 'pending' ? '#ffc107' : 
                                                (strtolower($order->status) === 'processing' ? '#17a2b8' : 
                                                (strtolower($order->status) === 'shipped' ? '#28a745' : 
                                                (strtolower($order->status) === 'completed' ? '#007bff' : '#dc3545'))) }};">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td style="padding: 10px;">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                        <td style="padding: 10px;">{{ optional($order->buyer)->name ?? 'N/A' }}</td>
                                        <td style="padding: 10px; text-align: center;">
                                            <a href="{{ route('seller.sales.show', $order->id) }}" 
                                            style="padding: 10px 20px; background-color: #5e5359; color: #ffffff; text-decoration: underline; border: none; border-radius: 4px; cursor: pointer; display: inline-block;">
                                            View Details
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        <div style="text-align: center; margin-top: 10px;">
                            {{ $orders->links() }}
                        </div>
                    @endif
                </div>
        </main>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('orderChart').getContext('2d');
        const orderChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: 'Completed',
                        data: [100, 150, 200, 250, 300, 350, 400, 450, 300, 200, 100, 50],
                        backgroundColor: '#66bb6a'
                    },
                    {
                        label: 'Canceled',
                        data: [50, 75, 100, 125, 150, 175, 200, 225, 150, 100, 50, 25],
                        backgroundColor: '#e57373'
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                }
            }
        });
    </script>
</x-app-layout>
