<form method="post" action="#" style="margin-top: 10px;">
    <div style="margin-bottom: 15px;">
        <p style="color: #555555; font-size: 14px; line-height: 1.5;">
            Once your account is deleted, all of its resources and data will be permanently deleted. 
            Please enter your password to confirm you would like to permanently delete your account.
        </p>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="delete_password" style="display: block; font-weight: bold; color: #333333; margin-bottom: 5px;">
            Password
        </label>
        <input type="password" id="delete_password" name="delete_password"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>

    <div style="display: flex; justify-content: flex-end; gap: 10px;">
        <button type="button" style="background-color: #ccc; color: #333333; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            Cancel
        </button>
        <button type="submit" style="background-color: #d9534f; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            Delete Account
        </button>
    </div>
</form>
