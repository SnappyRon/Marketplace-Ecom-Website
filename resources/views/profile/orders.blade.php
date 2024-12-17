<x-app-layout>
    <div style="display: flex; gap: 20px; padding: 20px;">
        <!-- Sidebar -->
        @include('profile.partials.sidebar')

        <!-- Orders List -->
        <div style="flex: 1; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <h2 style="font-size: 24px; color: #333333; margin-bottom: 20px;">My Orders</h2>
            @include('profile.partials.orders-list')
        </div>
    </div>
</x-app-layout>
