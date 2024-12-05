<x-app-layout>
    <x-slot name="title">Seller Dashboard</x-slot>

    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>Your Store: {{ Auth::user()->store_name ?? 'No Store Name Set' }}</p>

    <!-- Navigation Links -->
    <nav>
        <ul>
            <li><a href="{{ route('seller.products.index') }}">Manage Products</a></li>
            <li><a href="{{ route('seller.sales') }}">View Sales</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav>
</x-app-layout>
