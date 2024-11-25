@extends('layouts.app')

@section('title', 'MindanaoMarket - I\'m a Seller')

@section('content')
<section class="seller-section">
    <h2>Become a Seller</h2>
    <p>Register as a seller and start showcasing your products on MindanaoMarket.</p>
    <div class="form-container">
        <h2>Seller Registration</h2>
        <form action="{{ url('register_seller') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="store_name">Store Name:</label>
                <input type="text" id="store_name" name="store_name" placeholder="Store Name" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>

    <h2>Upload Your Products</h2>
    <p>Use the form below to upload your products.</p>
    <div class="form-container">
        <h2>Product Upload</h2>
        <form action="{{ url('upload_product') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" placeholder="Product Name" required>
            </div>
            <div class="form-group">
                <label for="product_description">Product Description:</label>
                <textarea id="product_description" name="product_description" rows="5" placeholder="Product Description" required></textarea>
            </div>
            <div class="form-group">
                <label for="product_price">Price:</label>
                <input type="number" id="product_price" name="product_price" placeholder="Price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="product_image">Product Image:</label>
                <input type="file" id="product_image" name="product_image" accept="image/*" required>
            </div>
            <button type="submit" class="btn">Upload Product</button>
        </form>
    </div>
</section>
@endsection
