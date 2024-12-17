<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    <!-- Current Password -->
    <div style="margin-bottom: 20px;">
        <label for="current_password" style="display: block; font-weight: bold; color: #333333;">Current Password</label>
        <input type="password" name="current_password" id="current_password"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>

    <!-- New Password -->
    <div style="margin-bottom: 20px;">
        <label for="password" style="display: block; font-weight: bold; color: #333333;">New Password</label>
        <input type="password" name="password" id="password"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>

    <!-- Confirm Password -->
    <div style="margin-bottom: 20px;">
        <label for="password_confirmation" style="display: block; font-weight: bold; color: #333333;">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>

    <button type="submit" style="background-color: #5e535a; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
        Update Password
    </button>
</form>
