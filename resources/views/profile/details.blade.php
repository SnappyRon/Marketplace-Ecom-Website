<x-app-layout>
    <div style="display: flex; gap: 20px; padding: 20px;">
        <!-- Sidebar -->
        @include('profile.partials.sidebar')

        <!-- Main Content -->
        <div style="flex: 1; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <!-- Profile Header -->
            <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 20px;">
                <div>
                    <img src="{{ auth()->user()->profile_image ?? '/default-avatar.png' }}" 
                         alt="Profile Picture" 
                         style="width: 100px; height: 100px; border-radius: 50%; border: 2px solid #ddd;">
                </div>
                <div>
                    <h2 style="font-size: 20px; color: #333333;">{{ auth()->user()->username }}</h2>
                </div>
            </div>

            <!-- Update Profile Information -->
            <h3 style="color: #333333; margin-bottom: 10px;">Update Profile Information</h3>
            @include('profile.partials.update-profile-information-form')

            <!-- Update Password -->
            <h3 style="color: #333333; margin-top: 30px; margin-bottom: 10px;">Update Password</h3>
            @include('profile.partials.update-password-form')

            <!-- Delete Account -->
            <h3 style="color: #333333; margin-top: 30px; margin-bottom: 10px;">Delete Account</h3>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
