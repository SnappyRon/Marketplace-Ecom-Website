{{-- <x-app-layout>
    <!-- Page Container -->
    <div style="display: flex; flex-direction: row; gap: 20px; padding: 20px;">
        <!-- Sidebar -->
        <aside style="width: 250px; background-color: #5e535a; color: #ffffff; padding: 20px; border-radius: 10px;">
            <h2 style="font-size: 18px; font-weight: bold; margin-bottom: 15px;">My Account</h2>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 10px;">
                    <a href="#" style="display: block; color: #ffffff; text-decoration: none; padding: 10px; border-radius: 5px; background-color: #4a464c;">
                        📄 My Details
                    </a>
                </li>
                @if(auth()->user()->role === 'buyer')
                    <li style="margin-bottom: 10px;">
                        <a href="#" style="display: block; color: #ffffff; text-decoration: none; padding: 10px; border-radius: 5px; background-color: #4a464c;">
                            📦 My Orders
                        </a>
                    </li>
                @endif
                <li>
                    <a href="#" style="display: block; color: #ffffff; text-decoration: none; padding: 10px; border-radius: 5px; background-color: #4a464c;">
                        ⚙️ Account Settings
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div style="flex: 1; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <!-- Profile Header -->
            <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 20px;">
                <!-- Profile Image -->
                <div>
                    <img src="{{ auth()->user()->profile_image ?? '/default-avatar.png' }}" 
                         alt="Profile Picture" 
                         style="width: 100px; height: 100px; border-radius: 50%; border: 2px solid #ddd;">
                </div>
                <!-- User Info -->
                <div>
                    <h2 style="font-size: 20px; color: #333333; margin: 0;">{{ auth()->user()->username }}</h2>
                    <p style="color: #555555; margin: 5px 0;">Role: <strong>{{ ucfirst(auth()->user()->role) }}</strong></p>
                    @if(auth()->user()->role === 'seller')
                        <span style="color: #4a464c; font-weight: bold;">Seller Dashboard</span>
                    @else
                        <span style="color: #4a464c;">Welcome, valued buyer!</span>
                    @endif
                </div>
            </div>

            <!-- Section: Update Profile Information -->
            <div style="margin-bottom: 30px;">
                <h2 style="font-size: 24px; color: #333333; margin-bottom: 10px;">My Details</h2>
                <p style="color: #555555; margin-bottom: 20px;">Update your account's profile information and email address.</p>
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Section: Update Password -->
            <div style="margin-bottom: 30px;">
                <h2 style="font-size: 24px; color: #333333; margin-bottom: 10px;">Update Password</h2>
                <p style="color: #555555; margin-bottom: 20px;">Ensure your account is using a long, random password to stay secure.</p>
                @include('profile.partials.update-password-form')
            </div>

            <!-- Section: Delete Account -->
            <div>
                <h2 style="font-size: 24px; color: #333333; margin-bottom: 10px;">Delete Account</h2>
                <p style="color: #555555; margin-bottom: 20px;">
                    Once your account is deleted, all of its resources and data will be permanently deleted. 
                    Before deleting your account, please download any data or information that you wish to retain.
                </p>
                @include('profile.partials.delete-user-form')
            </div>

            <!-- Section: My Orders (Buyer Only) -->
            @if(auth()->user()->role === 'buyer')
                <div style="margin-top: 30px;">
                    <h2 style="font-size: 24px; color: #333333; margin-bottom: 10px;">My Orders</h2>
                    <p style="color: #555555; margin-bottom: 10px;">View your recent orders and track their status.</p>
                    @include('profile.partials.orders-list')
                </div>
            @endif
        </div>
    </div>
</x-app-layout> --}}
