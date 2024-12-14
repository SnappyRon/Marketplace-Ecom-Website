<x-app-layout>
    <x-slot name="title">Add New Product</x-slot>

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
                <h1 style="margin: 0; color: #5e5359;">Add New Product</h1>
            </header>

            <!-- Form Section -->
            <section style="background: #ffffff; padding: 20px; border: 1px solid #5e5359; border-radius: 10px;">
                <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="margin-bottom: 15px;">
                        <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Product Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="description" style="display: block; margin-bottom: 5px; font-weight: bold;">Description</label>
                        <textarea id="description" name="description" required 
                                  style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">{{ old('description') }}</textarea>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="price" style="display: block; margin-bottom: 5px; font-weight: bold;">Price</label>
                        <input type="number" id="price" name="price" value="{{ old('price') }}" required 
                               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="image" style="display: block; margin-bottom: 5px; font-weight: bold;">Product Image</label>
                        <input type="file" id="image" name="image" required 
                               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    </div>

                    <button type="submit" 
                            style="padding: 10px 20px; background-color: #5e5359; color: #ffffff; border: none; border-radius: 5px; cursor: pointer;">
                        Add Product
                    </button>
                </form>
            </section>
        </main>
    </div>
</x-app-layout>
