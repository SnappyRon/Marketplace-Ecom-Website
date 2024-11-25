<section id="header">
    <a href="#"><img src="{{ asset('img/logo3.png') }}" class="logo" alt="Logo"></a>
    <div>
        <ul id="navbar">
            <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ url('/shop') }}" class="{{ request()->is('shop') ? 'active' : '' }}">Shop</a></li>
            <li><a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
            <li><a href="{{ url('/seller') }}" class="{{ request()->is('seller') ? 'active' : '' }}">I'm a Seller</a></li>
            <li><a href="{{ url('/cart') }}"><i class="ri-shopping-bag-line"></i></a></li>
        </ul>
    </div>
</section>
