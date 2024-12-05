<x-app-layout>
    <x-slot name="title">Add New Product</x-slot>

    <h1>Add New Product</h1>

    <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Product Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>
        </div>
        <div>
            <label for="image">Product Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit">Add Product</button>
    </form>
</x-app-layout>
