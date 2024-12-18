{{-- resources/views/product/details.blade.php --}}
<x-app-layout>
    <x-slot name="title">
        {{ $product->name }} - MindanaoMarket
    </x-slot>

    <section id="product-details" class="section-p1">
        <div class="container flex">
            <!-- Left: Product Images -->
            <div class="product-gallery">
                <!-- Main Image -->
                <div class="main-image">
                    <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}">
                </div>
                <!-- Thumbnail Images -->
                <div class="thumbnail-gallery flex">
                    <img src="{{ asset('img/' . $product->image) }}" alt="Thumbnail 1" class="thumbnail">
                    <img src="{{ asset('img/' . $product->image) }}" alt="Thumbnail 2" class="thumbnail">
                    <img src="{{ asset('img/' . $product->image) }}" alt="Thumbnail 3" class="thumbnail">
                </div>
            </div>

            <!-- Right: Product Details -->
            <div class="product-info">
                <h1 class="product-name">{{ $product->name }}</h1>
                <div class="product-price">
                    <span class="discounted-price">₱{{ number_format($product->price * 0.7, 2) }}</span>
                    <span class="original-price">₱{{ number_format($product->price, 2) }}</span>
                    <span class="discount-tag">30% OFF</span>
                </div>

                <!-- Size Selection -->
                <div class="size-selection">
                    <h3>Size</h3>
                    <div class="sizes">
                        <button class="size-btn">XS</button>
                        <button class="size-btn">S</button>
                        <button class="size-btn">M</button>
                        <button class="size-btn">L</button>
                    </div>
                </div>

                <!-- Add to Cart -->
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn add-to-cart">Add to Cart</button>
                </form>

                <!-- Product Description -->
                <p class="product-description">{{ $product->description }}</p>

                <!-- Additional Info -->
                <div class="extra-info">
                    <p><strong>Free Shipping:</strong> Free standard shipping on orders over ₱2,899</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Styles -->
    <style>
        .container {
            display: flex;
            gap: 30px;
        }

        .product-gallery {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .main-image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .thumbnail-gallery {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .thumbnail {
            width: 60px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer;
        }

        .product-info {
            flex: 1;
        }

        .product-name {
            font-size: 2rem;
            font-weight: bold;
        }

        .product-price {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 10px 0;
        }

        .discounted-price {
            font-size: 1.8rem;
            color: #5e5359;
            font-weight: bold;
        }

        .original-price {
            text-decoration: line-through;
            color: #888;
        }

        .discount-tag {
            background-color: #5e5359;
            color: #fff;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 0.8rem;
        }

        .size-selection h3 {
            margin-top: 15px;
        }

        .sizes {
            display: flex;
            gap: 10px;
        }

        .size-btn {
            padding: 5px 10px;
            border: 1px solid #ccc;
            cursor: pointer;
            border-radius: 5px;
            background-color: #f7f7f7;
        }

        .size-btn:hover {
            background-color: #e7e7e7;
        }

        .btn.add-to-cart {
            background-color: #5e5359;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px 0;
            font-size: 1rem;
        }

        .btn.add-to-cart:hover {
            background-color: #5e5359;
        }

        .product-description {
            margin-top: 10px;
            line-height: 1.6;
            color: #444;
        }

        .extra-info {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</x-app-layout>
