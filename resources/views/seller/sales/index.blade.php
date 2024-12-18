<x-app-layout>
    <x-slot name="title">Your Sales</x-slot>

    <!-- Dashboard Wrapper -->
    <div style="display: flex; min-height: 100vh; font-family: Arial, sans-serif; background-color: #ffffff; color: #333; box-sizing: border-box; overflow-x: hidden;">

        <!-- Sidebar -->
        <aside style="width: 250px; background: #352f33; color: #ffffff; padding: 20px; display: flex; flex-direction: column; gap: 20px;">
            <div style="font-size: 24px; font-weight: bold; text-align: center; margin-bottom: 20px;">Your Logo</div>
            <nav>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;"><a href="{{ route('seller.dashboard') }}" style="color: #ffffff; text-decoration: none; display: flex; align-items: center; gap: 10px;">🏠 Dashboard</a></li>
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
        <main style="flex: 1; padding: 20px; background-color: #f4f4f4; overflow-x: hidden;">
            <!-- Header -->
            <header style="margin-bottom: 20px;">
                <h1 style="margin: 0; color: #5e5359;">Your Sales</h1>
            </header>

            <section style="background: #ffffff; padding: 20px; border: 1px solid #5e5359; border-radius: 10px; overflow-x: auto;">
                @if ($orders->isEmpty())
                    <p style="color: #888;">You have no sales yet.</p>
                @else
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #5e5359; color: #ffffff;">
                                <th style="padding: 10px;">Order ID</th>
                                <th style="padding: 10px;">Buyer Name</th>
                                <th style="padding: 10px;">Email</th>
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
                                    <td style="padding: 10px;">₱{{ number_format($order->total_amount, 2) }}</td>
                                    <td style="padding: 10px;">
                                        <span style="padding: 5px 10px; color: #ffffff; border-radius: 4px; font-weight: bold; background-color: 
                                            {{ strtolower($order->status) === 'received' ? '#dc3545' : '#17a2b8' }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td style="padding: 10px;">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                    <td style="padding: 10px; text-align: center;">
                                        <a href="{{ route('seller.sales.show', $order->id) }}" style="text-decoration: none; color: #ffffff; background-color: #887983; padding: 5px 10px; border-radius: 4px;">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </section>

            <!-- Chart and Table Section -->
            <section style="margin-top: 20px; display: flex; gap: 20px; flex-wrap: wrap;">
                <!-- Pie Chart Card -->
                <div style="flex: 1; background: #ffffff; padding: 20px; border-radius: 10px; border: 1px solid #5e5359;">
                    <h3 style="color: #5e5359; text-align: center;">Revenue Breakdown</h3>
                    <canvas id="revenuePieChart" style="width: 100%; height: 300px;"></canvas>
                </div>

                <!-- Sample Revenue Table -->
                <div style="flex: 1; background: #ffffff; padding: 20px; border-radius: 10px; border: 1px solid #5e5359;">
                    <h3 style="color: #5e5359; text-align: center;">Sample Revenue Data</h3>
                    <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                        <thead>
                            <tr style="background: #5e5359; color: #ffffff;">
                                <th style="padding: 10px;">Month</th>
                                <th style="padding: 10px;">Revenue (₱)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background: #f4f4f4;"><td style="padding: 10px;">January</td><td style="padding: 10px;">₱5,000</td></tr>
                            <tr style="background: #ffffff;"><td style="padding: 10px;">February</td><td style="padding: 10px;">₱8,000</td></tr>
                            <tr style="background: #f4f4f4;"><td style="padding: 10px;">March</td><td style="padding: 10px;">₱12,000</td></tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Pie Chart Data
        const ctxPie = document.getElementById('revenuePieChart').getContext('2d');
        const revenuePieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Product A', 'Product B', 'Product C'],
                datasets: [{
                    data: [5000, 8000, 12000], // Static data as a sample
                    backgroundColor: ['#5e5359', '#887983', '#bba8a8']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: { color: '#5e5359' }
                    }
                }
            }
        });
    </script>
</x-app-layout>
