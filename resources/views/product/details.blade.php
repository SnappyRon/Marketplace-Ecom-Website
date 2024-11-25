@extends('layouts.app')

@section('title', $product->name)

@section('content')
<section class="product-details">
    <div class="product-container">
        <!-- Product Image -->
        <div class="product-image">
            <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}">
        </div>

        <!-- Product Information -->
        <div class="product-info">
            <h1 class="product-title">{{ $product->name }}</h1>
            <p class="product-id">Item ID: {{ $product->id }}</p>

            <!-- Price Section -->
            <div class="price-section">
                <p class="original-price">Was ₱{{ number_format($product->price * 1.2, 2) }}</p> <!-- Example 20% off -->
                <p class="discounted-price">Now ₱{{ number_format($product->price, 2) }}</p>
            </div>

            <!-- Stock and Size Information -->
            <div class="stock-size-info">
                <p class="stock-status">IN STOCK - ONLY A FEW LEFT</p>
                <p class="tax-note">* Prices do not include taxes</p>
            </div>

            <!-- Color Selection -->
            <div class="color-selection">
                <label for="color">Color: </label>
                <span class="color-option">{{ $product->color ?? 'Default' }}</span> <!-- Add color if available -->
            </div>

            <!-- Size Selection -->
            <div class="size-selection">
                <label for="size">Size: </label>
                <select id="size" name="size">
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                </select>
            </div>

            <!-- Quantity Selector -->
            <div class="quantity-selection">
                <label for="quantity">Quantity: </label>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
            </div>

            <!-- Buttons -->
            <div class="button-group">
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="add-to-bag">ADD TO BAG</button>
                </form>
                <button class="add-to-wishlist">ADD TO WISHLIST</button>
            </div>
        </div>
    </div>
</section>
@endsection
