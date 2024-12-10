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
                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @endauth
        </ul>
    </div>
</nav>
