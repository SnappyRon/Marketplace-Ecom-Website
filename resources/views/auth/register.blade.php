<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Register - Mindanao Market</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <!-- Outer Container -->
        <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden max-w-5xl w-full flex">
            <!-- Left Panel (Same styling as login) -->
            <div class="w-1/2 relative p-10 flex flex-col justify-center"
                 style="background: linear-gradient(to bottom right, #c8b6bd, #5e5359); border-top-left-radius: 2rem; border-bottom-left-radius: 2rem;">
                <h1 class="text-4xl font-bold text-white mb-4">
                    Join Our Community of Local Buyers and Sellers
                </h1>
                <p class="text-white text-sm mb-8">
                    At Mindanao Market, you'll discover vibrant local products and have the chance to grow your own small business. Sign up to get started on your journey.
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

                <h2 class="text-3xl font-bold text-gray-800 mb-1">Create Your Account</h2>
                <p class="text-sm text-gray-500 mb-10">
                    Please fill in the details below to sign up and start exploring or selling local products.
                </p>

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Name -->
                    <div>
                        <label for="name" class="block mb-2 text-gray-700 font-semibold">Name</label>
                        <input id="name" name="name" type="text" :value="old('name')" required autofocus autocomplete="name"
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400" 
                               placeholder="Your Name" />
                        @error('name')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block mb-2 text-gray-700 font-semibold">Email</label>
                        <input id="email" name="email" type="email" :value="old('email')" required autocomplete="username"
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400" 
                               placeholder="Email Address" />
                        @error('email')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block mb-2 text-gray-700 font-semibold">Password</label>
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400" 
                               placeholder="Password" />
                        @error('password')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-gray-700 font-semibold">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400" 
                               placeholder="Confirm Password" />
                        @error('password_confirmation')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Register Button -->
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
                    <a href="{{ route('seller.register') }}" class="text-[#5e5359] font-semibold hover:underline">Register as a Seller</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
