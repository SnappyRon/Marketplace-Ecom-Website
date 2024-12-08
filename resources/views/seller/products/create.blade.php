<x-app-layout>
    <x-slot name="title">Add New Product</x-slot>

    <h1>Add New Product</h1>

    <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <label for="name">Product Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" required>{{ old('description') }}</textarea>

        <label for="price">Price</label>
        <input type="number" id="price" name="price" value="{{ old('price') }}" required>

        <label for="image">Product Image</label>
        <input type="file" id="image" name="image" required>

        <button type="submit">Add Product</button>
    </form>
</x-app-layout>
