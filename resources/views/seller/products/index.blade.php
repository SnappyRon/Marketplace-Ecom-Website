<x-app-layout>
    <x-slot name="title">Manage Products</x-slot>

    <!-- Dashboard Wrapper -->
    <div style="display: flex; min-height: 100vh; font-family: Arial, sans-serif; background-color: #ffffff; color: #333;">

        <!-- Sidebar -->
        <aside style="width: 250px; background: #352f33; color: #ffffff; padding: 20px; display: flex; flex-direction: column; gap: 20px;">
            <!-- Logo -->
            <div style="font-size: 24px; font-weight: bold; text-align: center; margin-bottom: 20px;">Your Logo</div>

            <!-- Navigation Menu -->
            <nav>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;">
                        <a href="{{ route('seller.dashboard') }}" style="color: #ffffff; text-decoration: none; display: flex; align-items: center; gap: 10px;">
                            🏠 Dashboard
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;"><a href="{{ route('seller.products.index') }}" style="color: #ffffff; text-decoration: none; display: flex; align-items: center; gap: 10px;">📦 Manage Products</a></li>
                    <li style="margin-bottom: 10px;"><a href="{{ route('seller.sales') }}" style="color: #ffffff; text-decoration: none; display: flex; align-items: center; gap: 10px;">📊 View Sales</a></li>
                    <li style="margin-bottom: 10px;"><a href="#" style="color: #ffffff; text-decoration: none; display: flex; align-items: center; gap: 10px;">⚙️ Settings</a></li>
                    <li style="margin-top: 20px;">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; color: #ffffff; border: none; cursor: pointer; display: flex; align-items: center; gap: 10px;">🔓 Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main style="flex: 1; padding: 20px; background-color: #f4f4f4;">
            <!-- Header -->
            <header style="margin-bottom: 20px;">
                <h1 style="margin: 0; color: #5e5359;">Manage Your Products</h1>
            </header>

            <!-- Action Buttons -->
            <div style="margin-bottom: 20px;">
                <a href="{{ route('seller.products.create') }}" style="background: #5e5359; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-right: 10px;">Add New Product</a>
                <a href="{{ route('seller.sales') }}" style="background: #5e5359; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">View Sales</a>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            <!-- Products Table -->
            <div style="background: #ffffff; padding: 20px; border: 1px solid #5e5359; border-radius: 10px;">
                <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                    <thead>
                        <tr style="background: #5e5359; color: #ffffff;">
                            <th style="text-align: left; padding: 10px;">Name</th>
                            <th style="text-align: right; padding: 10px;">Price</th>
                            <th style="text-align: center; padding: 10px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr style="background: #f4f4f4;">
                                <td style="text-align: left; padding: 10px;">{{ $product->name }}</td>
                                <td style="text-align: right; padding: 10px;">₱{{ number_format($product->price, 2) }}</td>
                                <td style="text-align: center; padding: 10px;">
                                    <a href="{{ route('seller.products.edit', $product) }}" style="margin-right: 10px; color: #5e5359; text-decoration: none;">Edit</a>
                                    <form action="{{ route('seller.products.destroy', $product) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')" style="color: red; background: none; border: none; cursor: pointer;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" style="text-align: center; padding: 10px;">No products available. <a href="{{ route('seller.products.create') }}" style="color: #5e5359;">Add your first product!</a></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</x-app-layout>
