<form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <!-- Profile Image -->
    <div style="margin-bottom: 20px;">
        <label style="display: block; font-weight: bold; color: #333333;">Profile Image</label>
        <input type="file" name="profile_image" style="margin-top: 5px;">
    </div>

    <!-- Name -->
    <div style="margin-bottom: 20px;">
        <label for="name" style="display: block; font-weight: bold; color: #333333;">Name</label>
        <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" 
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>

    <button type="submit" style="background-color: #5e535a; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
        Save Changes
    </button>
</form>
