<x-app-layout>
    <x-slot name="title">
        My Account
    </x-slot>

    <div style="display: flex; min-height: 100vh; font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; gap: 20px;">
        <!-- Sidebar -->
        <aside style="width: 250px; background: #5e535a; color: #ffffff; padding: 20px; border-radius: 10px; display: flex; flex-direction: column; gap: 15px;">
            <h2 style="font-size: 18px; font-weight: bold; text-align: center;">My Account</h2>
            <nav>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;">
                        <a href="#" style="color: #ffffff; text-decoration: none; padding: 10px; display: block; border-radius: 5px; background-color: #4a464c;">
                            📄 My Details
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#" style="color: #ffffff; text-decoration: none; padding: 10px; display: block; border-radius: 5px; background-color: #4a464c;">
                            📍 My Address Book
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#" style="color: #ffffff; text-decoration: none; padding: 10px; display: block; border-radius: 5px; background-color: #4a464c;">
                            📦 My Orders
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#" style="color: #ffffff; text-decoration: none; padding: 10px; display: block; border-radius: 5px; background-color: #4a464c;">
                            ✉️ My Newsletters
                        </a>
                    </li>
                    <li>
                        <a href="#" style="color: #ffffff; text-decoration: none; padding: 10px; display: block; border-radius: 5px; background-color: #4a464c;">
                            ⚙️ Account Settings
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main style="flex: 1; background-color: #ffffff; padding: 30px; border-radius: 10px; border: 1px solid #5e535a;">
            <h2 style="font-size: 24px; color: #5e535a; margin-bottom: 20px;">My Details</h2>

            <!-- Personal Information Section -->
            <div style="margin-bottom: 20px;">
                <h3 style="font-size: 18px; color: #5e535a; margin-bottom: 10px;">Personal Information</h3>
                <p style="color: #888; font-size: 14px;">Update your account's profile information and email address.</p>

                <form method="post" action="#" style="margin-top: 20px;">
                    <!-- Name Fields -->
                    <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                        <div style="flex: 1;">
                            <label for="first_name" style="display: block; font-weight: bold; color: #5e535a; margin-bottom: 5px;">First Name</label>
                            <input type="text" id="first_name" name="first_name" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
                        </div>
                        <div style="flex: 1;">
                            <label for="second_name" style="display: block; font-weight: bold; color: #5e535a; margin-bottom: 5px;">Second Name</label>
                            <input type="text" id="second_name" name="second_name" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
                        </div>
                    </div>

                    <!-- Save Button -->
                    <button type="submit" style="padding: 10px 20px; background-color: #5e535a; color: #ffffff; border: none; border-radius: 5px; cursor: pointer;">
                        Save
                    </button>
                </form>
            </div>
        </main>
    </div>
</x-app-layout>
