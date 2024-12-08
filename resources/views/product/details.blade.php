{{-- resources/views/product/details.blade.php --}}
<x-app-layout>
    <x-slot name="title">
        {{ $product->name }} - MindanaoMarket
    </x-slot>

    <section id="product-details" class="section-p1">
        <div class="product-image">
            <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}">
        </div>
        <div class="product-info">
            <h1>{{ $product->name }}</h1>
            <h2>₱{{ number_format($product->price, 2) }}</h2>
            <p>{{ $product->description }}</p>
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn">Add to Cart</button>
            </form>
        </div>
    </section>
</x-app-layout>
