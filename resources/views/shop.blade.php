{{-- resources/views/shop.blade.php --}}
<x-app-layout>
    <x-slot name="title">
        MindanaoMarket - Shop
    </x-slot>

    <section id="product1" class="section-p1">
        <h2>New Listed Products</h2>
        <p>Hot Deals!</p>
        <div class="pro-container1">
            @foreach ($products as $product)
            <a href="{{ route('product.details', $product->id) }}" class="pro-link">
                <div class="pro">
                    <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}">
                    <div class="des">
                        <span>{{ $product->supplier_name }}</span>
                        <h5>{{ $product->name }}</h5>
                        <h4>₱{{ number_format($product->price, 2) }}</h4>
                    </div>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="ri-shopping-cart-line cart">+</button>
                    </form>
                </div>
            </a>
            @endforeach
        </div>
    </section>
</x-app-layout>
