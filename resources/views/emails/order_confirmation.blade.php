<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Thank you for your order!</h1>

    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Full Name:</strong> {{ $order->full_name }}</p>
    <p><strong>Phone Number:</strong> {{ $order->phone_number }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}, {{ $order->city }}, {{ $order->state }}, {{ $order->postal_code }}, {{ $order->country }}</p>
    <p><strong>Total Amount:</strong> ₱{{ number_format($order->total_amount, 2) }}</p>

    <h3>Order Items:</h3>
    <ul>
        @foreach ($order->items as $item)
            <li>{{ $item->product->name }} - ₱{{ number_format($item->price, 2) }} x {{ $item->quantity }}</li>
        @endforeach
    </ul>

    <p>Your order is currently <strong>{{ $order->status }}</strong>.</p>

    <p>Thank you for shopping with us!</p>
</body>
</html>
