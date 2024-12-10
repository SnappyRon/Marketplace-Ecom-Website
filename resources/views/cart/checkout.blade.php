<x-app-layout>
    <x-slot name="title">
        Checkout
    </x-slot>

    <section style="padding: 20px; font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333;">
        <h1 style="text-align: center; font-size: 24px; color: #5e535a;">Checkout</h1>

        @if ($errors->any())
            <div style="margin-bottom: 20px; padding: 10px; border: 1px solid #e57373; background-color: #ffcdd2; border-radius: 5px;">
                <ul style="margin: 0; padding: 0; list-style: none; color: #d32f2f;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cart.checkout') }}" method="POST" style="display: flex; gap: 20px; margin-top: 20px;">
            @csrf

            <!-- Buyer Details -->
            <div style="flex: 2; background-color: #ffffff; padding: 20px; border: 1px solid #5e535a; border-radius: 10px;">
                <h2 style="margin-bottom: 20px; font-size: 18px; color: #5e535a;">Shipping Details</h2>

                <div style="margin-bottom: 15px;">
                    <label for="full_name" style="display: block; margin-bottom: 5px; color: #5e535a;">Full Name:</label>
                    <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="phone_number" style="display: block; margin-bottom: 5px; color: #5e535a;">Phone Number:</label>
                    <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="email" style="display: block; margin-bottom: 5px; color: #5e535a;">Email Address:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="shipping_address" style="display: block; margin-bottom: 5px; color: #5e535a;">Shipping Address:</label>
                    <textarea name="shipping_address" id="shipping_address" rows="3" required
                              style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">{{ old('shipping_address') }}</textarea>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="city" style="display: block; margin-bottom: 5px; color: #5e535a;">City:</label>
                    <input type="text" name="city" id="city" value="{{ old('city') }}" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div class="form-group">
                    <label for="country">Country:</label>
                    <select name="country" id="country" required>
                        <option value="Philippines" {{ old('country') == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                    </select>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="state" style="display: block; margin-bottom: 5px; color: #5e535a;">State/Province:</label>
                    <input type="text" name="state" id="state" value="{{ old('state') }}" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="postal_code" style="display: block; margin-bottom: 5px; color: #5e535a;">Postal Code:</label>
                    <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}" required
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
            </div>

            <!-- Order Summary -->
            <div style="flex: 1; background-color: #ffffff; padding: 20px; border: 1px solid #5e535a; border-radius: 10px;">
                <h2 style="margin-bottom: 20px; font-size: 18px; color: #5e535a;">Order Summary</h2>

                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <thead>
                        <tr style="background-color: #5e535a; color: #ffffff;">
                            <th style="padding: 10px; text-align: left;">Product</th>
                            <th style="padding: 10px; text-align: center;">Price</th>
                            <th style="padding: 10px; text-align: center;">Quantity</th>
                            <th style="padding: 10px; text-align: right;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $id => $item)
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 10px; text-align: left;">{{ $item['name'] }}</td>
                                <td style="padding: 10px; text-align: center;">₱{{ number_format($item['price'], 2) }}</td>
                                <td style="padding: 10px; text-align: center;">{{ $item['quantity'] }}</td>
                                <td style="padding: 10px; text-align: right;">₱{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h3 style="text-align: right; font-size: 18px; color: #5e535a;">Total: ₱{{ number_format($total, 2) }}</h3>

                <h2 style="margin: 20px 0; font-size: 16px; color: #5e535a;">Payment Methods</h2>
                <div style="display: flex; gap: 10px; align-items: center;">
                    <p style="margin: 0; color: #5e535a; font-weight: bold;">Payment Options:</p>
                    <img src="{{ asset('img/pay/pay.png') }}" alt="Payment Methods" style="max-height: 25px; width: auto;">
                </div>

                <button type="submit" style="display: block; width: 100%; background-color: #5e535a; color: #ffffff; padding: 10px; border: none; border-radius: 5px; margin-top: 20px; cursor: pointer;">
                    Place Order
                </button>
            </div>
        </form>
    </section>
</x-app-layout>
