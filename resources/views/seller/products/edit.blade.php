<x-app-layout>
    <x-slot name="title">Edit Product</x-slot>

    <h1>Edit Product</h1>

    <form action="{{ route('seller.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div>
            <label for="description">Product Description:</label>
            <textarea id="description" name="description" required>{{ $product->description }}</textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}" step="0.01" required>
        </div>
        <div>
            <label for="image">Product Image:</label>
            @if($product->image)
                <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}" width="100">
            @endif
            <input type="file" id="image" name="image" accept="image/*">
            <p>Leave empty to keep existing image.</p>
        </div>
        <button type="submit">Update Product</button>
    </form>
</x-app-layout>
