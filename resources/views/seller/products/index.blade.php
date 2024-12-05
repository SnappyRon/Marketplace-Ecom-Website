<x-app-layout>
    <x-slot name="title">Manage Products</x-slot>

    <h1>Your Products</h1>
    <a href="{{ route('seller.products.create') }}">Add New Product</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>₱{{ number_format($product->price, 2) }}</td>
                    <td>
                        <a href="{{ route('seller.products.edit', $product) }}">Edit</a>
                        <form action="{{ route('seller.products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
