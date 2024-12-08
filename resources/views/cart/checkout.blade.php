{{-- resources/views/cart/checkout.blade.php --}}
<x-app-layout>
    <x-slot name="title">
        Checkout
    </x-slot>

    <section class="checkout-section">
        <h2>Checkout</h2>

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf

            <div class="buyer-details">
                <h3>Shipping Details</h3>

                <div class="form-group">
                    <label for="full_name">Full Name:</label>
                    <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" required>
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="shipping_address">Shipping Address:</label>
                    <textarea name="shipping_address" id="shipping_address" rows="3" required>{{ old('shipping_address') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" name="city" id="city" value="{{ old('city') }}" required>
                </div>

                <div class="form-group">
                    <label for="state">State/Province:</label>
                    <input type="text" name="state" id="state" value="{{ old('state') }}" required>
                </div>

                <div class="form-group">
                    <label for="postal_code">Postal Code:</label>
                    <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}" required>
                </div>

                <div class="form-group">
                    <label for="country">Country:</label>
                    <select name="country" id="country" required>
                        <option value="" disabled selected>Select your country</option>
                        <option value="USA" {{ old('country') == 'USA' ? 'selected' : '' }}>United States</option>
                        <option value="Canada" {{ old('country') == 'Canada' ? 'selected' : '' }}>Canada</option>
                        <option value="UK" {{ old('country') == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                        <!-- Add more countries as needed -->
                    </select>
                </div>
            </div>

            <div class="cart-summary">
                <h3>Order Summary</h3>
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $id => $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>₱{{ number_format($item['price'], 2) }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>₱{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h3>Total: ₱{{ number_format($total, 2) }}</h3>
            </div>

            <div class="payment-method">
                <h3>Payment Method</h3>
                <!-- Implement payment gateway integration here -->
                <p>Payment processing is under development.</p>
                <button type="submit" class="checkout-btn">Place Order</button>
            </div>
        </form>
    </section>
</x-app-layout>
