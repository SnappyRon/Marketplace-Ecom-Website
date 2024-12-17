<aside style="width: 250px; background-color: #5e535a; color: #ffffff; padding: 20px; border-radius: 10px;">
    <h2 style="font-size: 18px; font-weight: bold; margin-bottom: 15px;">My Account</h2>
    <ul style="list-style: none; padding: 0; margin: 0;">
        <li style="margin-bottom: 10px;">
            <a href="{{ route('profile.details') }}" 
               style="display: block; color: #ffffff; text-decoration: none; padding: 10px; border-radius: 5px; background-color: #4a464c;">
                📄 My Details
            </a>
        </li>
        @if(auth()->user()->role === 'buyer')
            <li style="margin-bottom: 10px;">
                <a href="{{ route('profile.orders') }}" 
                   style="display: block; color: #ffffff; text-decoration: none; padding: 10px; border-radius: 5px; background-color: #4a464c;">
                    📦 My Orders
                </a>
            </li>
        @endif
    </ul>
</aside>
