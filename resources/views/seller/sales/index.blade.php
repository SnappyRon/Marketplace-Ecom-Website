{{-- resources/views/seller/sales/index.blade.php --}}
<x-app-layout>
    <x-slot name="title">Your Sales</x-slot>

    <section class="sales-section">
        <h1>Your Sales</h1>

        @if ($orders->isEmpty())
            <p>You have no sales yet.</p>
        @else
            <table class="sales-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Buyer Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Shipping Address</th>
                        <th>City</th>
                        <th>State/Province</th>
                        <th>Postal Code</th>
                        <th>Country</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->full_name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone_number }}</td>
                            <td>{{ $order->shipping_address }}</td>
                            <td>{{ $order->city }}</td>
                            <td>{{ $order->state }}</td>
                            <td>{{ $order->postal_code }}</td>
                            <td>{{ $order->country }}</td>
                            <td>₱{{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                <span class="status {{ strtolower($order->status) }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('seller.sales.show', $order->id) }}" class="view-details-btn">View Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="pagination">
                {{ $orders->links() }}
            </div>
        @endif
    </section>

    <!-- Optional: Add some basic styles for better presentation -->
    <style>
        .sales-section {
            padding: 20px;
        }

        .sales-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .sales-table th, .sales-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            vertical-align: top;
        }

        .sales-table th {
            background-color: #f4f4f4;
        }

        .status {
            padding: 5px 10px;
            border-radius: 4px;
            color: #fff;
            font-weight: bold;
            text-align: center;
            display: inline-block;
            min-width: 80px;
        }

        .status.pending {
            background-color: #ffc107;
        }

        .status.processing {
            background-color: #17a2b8;
        }

        .status.shipped {
            background-color: #28a745;
        }

        .status.completed {
            background-color: #007bff;
        }

        .status.cancelled {
            background-color: #dc3545;
        }

        .view-details-btn {
            padding: 6px 12px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .view-details-btn:hover {
            background-color: #0056b3;
        }

        .pagination {
            text-align: center;
        }
    </style>
</x-app-layout>
