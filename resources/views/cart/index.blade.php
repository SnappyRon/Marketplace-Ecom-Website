@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<section class="cart-section">
    <h2>Your Cart</h2>

    @if (!count($cartItems)) <!-- Correct condition -->
        <p class="empty-cart">Your cart is empty.</p>
    @else
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $id => $item)
                    <tr>
                        <td>
                            <img src="{{ asset('img/' . $item['image']) }}" alt="{{ $item['name'] }}" class="cart-item-image"> <!-- Fixed path -->
                        </td>
                        <td>{{ $item['name'] }}</td>
                        <td>₱{{ number_format($item['price'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>₱{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="remove-btn">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="cart-total">
            <h3>Total: ₱{{ number_format($total, 2) }}</h3>
        </div>
    @endif
</section>
@endsection
