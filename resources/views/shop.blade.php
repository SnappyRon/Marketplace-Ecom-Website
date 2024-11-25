@extends('layouts.app')

@section('title', 'MindanaoMarket - Shop')

@section('content')
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
                    <a href="#"><i class="ri-account-circle-line profile"></i></a>
                </form>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endsection
