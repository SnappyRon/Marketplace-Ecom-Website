<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Register as Seller - Mindanao Market</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <!-- Outer Container -->
        <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden max-w-5xl w-full flex">
            <!-- Left Panel -->
            <div class="w-1/2 relative p-10 flex flex-col justify-center"
                 style="background: linear-gradient(to bottom right, #c8b6bd, #5e5359); border-top-left-radius: 2rem; border-bottom-left-radius: 2rem;">
                <h1 class="text-4xl font-bold text-white mb-4">
                    Grow Your Business with Mindanao Market
                </h1>
                <p class="text-white text-sm mb-8">
                    Join our community of local sellers. Set up your store, reach new customers, and celebrate our region's rich culture through your products.
                </p>
                <!-- Illustration -->
                <div class="flex items-end justify-start">
                    <img src="{{ asset('img/banner/b7.jpg') }}" alt="Local Products Illustration"
                         class="w-2/3 object-contain" />
                </div>
            </div>

            <!-- Right Panel -->
            <div class="w-1/2 flex flex-col p-10">
                <!-- Logo & Brand Name -->
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-10 h-10 flex items-center justify-center bg-[#5e5359] rounded-full">
                        <img src="{{ asset('img/logo3.png') }}" alt="Mindanao Market Logo" class="w-6 h-6 object-contain"/>
                    </div>
                    <span class="font-bold text-gray-800 text-lg">Mindanao Market</span>
                </div>

                <h2 class="text-3xl font-bold text-gray-800 mb-1">Register as a Seller</h2>
                <p class="text-sm text-gray-500 mb-10">
                    Please fill out the form below to create your seller account and start listing products.
                </p>

                @if ($errors->any())
                    <div class="mb-6">
                        <ul class="list-disc list-inside text-red-500 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Seller Registration Form -->
                <form action="{{ route('seller.register') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-gray-700 font-semibold">Full Name</label>
                        <input type="text" id="name" name="name" required
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400" 
                               placeholder="Your Name" />
                    </div>

                    <div>
                        <label for="store_name" class="block mb-2 text-gray-700 font-semibold">Store Name</label>
                        <input type="text" id="store_name" name="store_name" required
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400" 
                               placeholder="Your Store Name" />
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-gray-700 font-semibold">Email</label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400" 
                               placeholder="Email Address" />
                    </div>

                    <div>
                        <label for="password" class="block mb-2 text-gray-700 font-semibold">Password</label>
                        <input type="password" id="password" name="password" required
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400" 
                               placeholder="Password" />
                    </div>

                    <div>
                        <label for="password_confirmation" class="block mb-2 text-gray-700 font-semibold">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400" 
                               placeholder="Confirm Password" />
                    </div>

                    <div>
                        <button type="submit"
                                class="w-full py-3 bg-[#5e5359] hover:bg-[#4e464d] text-white font-semibold rounded transition">
                            Register
                        </button>
                    </div>
                </form>

                <p class="text-center text-sm text-gray-500 mt-8">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-[#5e5359] font-semibold hover:underline">Log in</a> or 
                    <a href="{{ route('register') }}" class="text-[#5e5359] font-semibold hover:underline">Sign up as a Buyer</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
