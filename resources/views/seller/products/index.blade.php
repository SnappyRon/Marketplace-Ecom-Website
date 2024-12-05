<x-app-layout>
    <x-slot name="title">Manage Products</x-slot>

    <h1>Manage Your Products</h1>
    <div style="margin-bottom: 20px;">
        <a href="{{ route('seller.products.create') }}" style="display: inline-block; margin-right: 10px;">Add New Product</a>
        <a href="{{ route('seller.sales') }}" style="display: inline-block;">View Sales</a>
    </div>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="text-align: left;">Name</th>
                <th style="text-align: right;">Price</th>
                <th style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td style="text-align: left;">{{ $product->name }}</td>
                    <td style="text-align: right;">₱{{ number_format($product->price, 2) }}</td>
                    <td style="text-align: center;">
                        <a href="{{ route('seller.products.edit', $product) }}" style="margin-right: 10px;">Edit</a>
                        <form action="{{ route('seller.products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')" style="color: red;">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align: center;">No products available. <a href="{{ route('seller.products.create') }}">Add your first product!</a></td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-app-layout>
