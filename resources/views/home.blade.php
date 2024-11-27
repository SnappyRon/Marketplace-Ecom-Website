{{-- resources/views/home.blade.php --}}
<x-app-layout>
    <x-slot name="title">
        MindanaoMarket - Home
    </x-slot>
    <section id="hero">
        <h4>Ka Bisdak! May Discount Ka!</h4>
        <h2>Super Value Deals</h2>
        <h1>Local Products Only</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <button onclick="window.location.href='{{ url('shop') }}';">Shop Now</button>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box"><img src="{{ asset('img/features/f1.png') }}" alt=""><h6>Free Delivery</h6></div>
        <div class="fe-box"><img src="{{ asset('img/features/f2.png') }}" alt=""><h6>Online Order</h6></div>
        <div class="fe-box"><img src="{{ asset('img/features/f3.png') }}" alt=""><h6>Save Money</h6></div>
        <div class="fe-box"><img src="{{ asset('img/features/f4.png') }}" alt=""><h6>Promotions</h6></div>
        <div class="fe-box"><img src="{{ asset('img/features/f5.png') }}" alt=""><h6>Happy Sell</h6></div>
        <div class="fe-box"><img src="{{ asset('img/features/f6.png') }}" alt=""><h6>24/7 Support</h6></div>
    </section>

    <section id="product1" class="section-p1">
        <h2>New Listed Products</h2>
        <p>Hot Deals!</p>
        <div class="pro-container">
            @foreach ($products as $product)
                <a href="{{ route('product.details', $product->id) }}" class="pro-link">
                    <div class="pro">
                        <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="des">
                            <span>{{ $product->supplier_name }}</span>
                            <h5>{{ $product->name }}</h5>
                            <h4>₱{{ number_format($product->price, 2) }}</h4>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="view-more">
            <a href="{{ url('/shop') }}" class="btn">View All Products</a>
        </div>
    </section>


</x-app-layout>
