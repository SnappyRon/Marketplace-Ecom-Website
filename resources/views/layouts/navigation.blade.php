<nav id="header">
    <a href="{{ route('home') }}">
        <img src="{{ asset('img/logo3.png') }}" class="logo" alt="Logo"></a>
    <div>
        <ul id="navbar">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('shop') }}" class="{{ request()->routeIs('shop') ? 'active' : '' }}">Shop</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            <li><a href="{{ route('seller.dashboard') }}" class="{{ request()->routeIs('seller.dashboard') ? 'active' : '' }}">I'm a Seller</a></li>
            <li style="position: relative; display: inline-block;">
                    <a href="{{ route('cart.index') }}" style="position: relative; display: inline-block;">
                        <i class="ri-shopping-bag-line" style="font-size: 24px; position: relative; z-index: 1;"></i>
                        @php
                            $cartCount = session()->has('cart') ? count(session()->get('cart')) : 0;
                        @endphp
                        @if ($cartCount > 0)
                            <span style="
                                position: absolute;
                                top: -10px; /* Adjusted for higher placement */
                                right: -7px; /* Slightly closer to the edge */
                                background-color: #dc3545;
                                color: white;
                                font-size: 12px;
                                font-weight: bold;
                                padding: 2px 5px;
                                border-radius: 50%;
                                display: inline-block;
                                text-align: center;
                                min-width: 18px;
                                z-index: 0; /* Ensures it goes behind the icon */
                            ">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>
                </li>
            @auth
                <li><a href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button 
                            type="submit" 
                            style="padding: 10px 20px; background-color: #5e5359; color: white; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;"
                            onmouseover="this.style.backgroundColor='#4e464d'" 
                            onmouseout="this.style.backgroundColor='#5e5359'">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </li>
            @else
                <!-- Replace the Login link with a button to open the modal -->
                <li>
                    <button onclick="openForm()" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">
                        {{ __('Login') }}
                    </button>
                </li>
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @endauth
        </ul>
    </div>
</nav>

<!-- Add the modal code after the navigation -->
<div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(5px); z-index: 1000;">
    <div style="max-width: 400px; margin: 50px auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); position: relative;">
        <button onclick="closeForm()" style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 18px; cursor: pointer;">&times;</button>
        <h2>Welcome Back!</h2>
        <p>Please log in to access your account.</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
                <input id="email" type="email" name="email" required autofocus autocomplete="username" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <!-- Password -->
            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px;">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <!-- Remember Me -->
            <div style="margin-bottom: 15px;">
                <label for="remember_me" style="font-size: 14px;">
                    <input id="remember_me" type="checkbox" name="remember">
                    Remember Me
                </label>
            </div>

            <!-- Forgot Password and Submit -->
            <div style="display: flex; justify-content: space-between; align-items: center;">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="font-size: 14px; color: #555;">Forgot your password?</a>
                @endif
                <button type="submit" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">
                    Log In
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openForm() {
        document.getElementById('overlay').style.display = 'block';
    }

    function closeForm() {
        document.getElementById('overlay').style.display = 'none';
    }
</script>
