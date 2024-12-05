<x-app-layout>
    <x-slot name="title">Sales Overview</x-slot>

    <h1>Your Sales</h1>

    {{-- Display sales data --}}
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            {{-- Replace this with a loop for actual sales data --}}
            <tr>
                <td>1</td>
                <td>Sample Product</td>
                <td>John Doe</td>
                <td>₱100.00</td>
                <td>{{ now()->toDateString() }}</td>
            </tr>
        </tbody>
    </table>
</x-app-layout>
