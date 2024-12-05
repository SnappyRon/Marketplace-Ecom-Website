{{-- resources/views/layouts/navigation.blade.php --}}
<nav id="header">
    <a href="{{ route('home') }}">
        <img src="{{ asset('img/logo3.png') }}" class="logo" alt="Logo"></a>
    <div>
        <ul id="navbar">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('shop') }}" class="{{ request()->routeIs('shop') ? 'active' : '' }}">Shop</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            <li><a href="{{ route('seller.dashboard') }}" class="{{ request()->routeIs('seller.dashboard') ? 'active' : '' }}">I'm a Seller</a></li>
            <li><a href="{{ route('cart.index') }}"><i class="ri-shopping-bag-line"></i></a></li>
            @auth
                <li><a href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit">{{ __('Logout') }}</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @endauth
        </ul>
    </div>
</nav>
