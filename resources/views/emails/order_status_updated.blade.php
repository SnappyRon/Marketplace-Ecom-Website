{{-- resources/views/emails/order_status_updated.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Order Status Updated</title>
</head>
<body>
    <h2>Order Status Update - Order #{{ $order->id }}</h2>

    <p>Dear {{ $order->buyer->name }},</p>

    <p>Your order status has been updated to <strong>{{ $order->status }}</strong>.</p>

    <p><strong>Order Details:</strong></p>
    <p>Order ID: {{ $order->id }}</p>
    <p>Total Amount: ₱{{ number_format($order->total_amount, 2) }}</p>
    <p>Shipping Address: {{ $order->shipping_address }}</p>
    <p>Order Date: {{ $order->created_at->format('Y-m-d H:i') }}</p>

    <p>Thank you for shopping with us!</p>

    <p>Best regards,<br>Your Company Name</p>
</body>
</html>
