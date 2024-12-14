<x-app-layout>
    <x-slot name="title">
        Your Bag
    </x-slot>

    <section style="padding: 20px; font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333;">
        <h1 style="text-align: center; font-size: 24px; color: #5e535a;">Your Bag</h1>

        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 20px; margin-top: 20px;">
            <!-- Cart Items -->
            <div style="flex: 2; background-color: #ffffff; padding: 20px; border: 1px solid #5e535a; border-radius: 10px;">
                <h2 style="margin-bottom: 20px; font-size: 18px; color: #5e535a;">Shopping Bag ({{ count($cartItems) }})</h2>

                @if (!count($cartItems))
                    <p style="text-align: center; color: #888;">Your cart is empty.</p>
                @else
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                        <thead>
                            <tr style="background-color: #5e535a; color: #ffffff;">
                                <th style="padding: 10px; text-align: left;">Product</th>
                                <th style="padding: 10px; text-align: center;">Price</th>
                                <th style="padding: 10px; text-align: center;">Quantity</th>
                                <th style="padding: 10px; text-align: center;">Total</th>
                                <th style="padding: 10px; text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $id => $item)
                                <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                                    <td style="padding: 10px; display: flex; align-items: center; gap: 10px;">
                                        <img src="{{ asset('img/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px; height: 50px; border-radius: 5px; border: 1px solid #ddd;">
                                        <div>
                                            <strong style="color: #5e535a;">{{ $item['name'] }}</strong>
                                            <!-- <p style="margin: 0; font-size: 12px; color: #888;">Only {{ $item['stock'] ?? 'N/A' }} left in stock</p> -->
                                        </div>
                                    </td>
                                    <td style="padding: 10px; text-align: center;">₱{{ number_format($item['price'], 2) }}</td>
                                    <td style="padding: 10px; text-align: center;">
                                        <form action="{{ route('cart.update', $id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" style="width: 50px; text-align: center; border: 1px solid #ddd; border-radius: 5px;">
                                            <button type="submit" style="background-color: #5e535a; color: #fff; border: none; padding: 5px 10px; border-radius: 5px; margin-top: 5px; cursor: pointer;">Update</button>
                                        </form>
                                    </td>
                                    <td style="padding: 10px; text-align: center;">₱{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                    <td style="padding: 10px; text-align: center;">
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            <button type="submit" style="background-color: #dc3545; color: #fff; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <!-- Order Summary -->
            <div style="flex: 1; background-color: #ffffff; padding: 20px; border: 1px solid #5e535a; border-radius: 10px;">
                <h2 style="font-size: 18px; color: #5e535a; margin-bottom: 20px;">Order Summary</h2>
                <div style="margin-bottom: 20px; display: flex; justify-content: space-between; font-weight: bold;">
                    <span>Estimated Total:</span>
                    <span>₱{{ number_format($total, 2) }}</span>
                </div>
                <a href="{{ route('cart.checkout.form') }}" style="display: block; text-align: center; background-color: #5e535a; color: #ffffff; text-decoration: none; padding: 10px; border-radius: 5px;">Checkout Now</a>
                <div style="margin-top: 20px; display: flex; align-items: center; gap: 10px;">
                    <p style="margin: 0; color: #5e535a; font-weight: bold; flex-shrink: 0;">Payment Methods:</p>
                    <img src="{{ asset('img/pay/pay.png') }}" alt="Payment Methods" style="max-height: 25px; width: auto; display: inline-block;">
                </div>

            </div>
        </div>
    </section>
</x-app-layout>
     