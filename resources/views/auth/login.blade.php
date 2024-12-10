<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login - Mindanao Market</title>
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
                    Discover, Shop, and Sell Local Products
                </h1>
                <p class="text-white text-sm mb-8">
                    At Mindanao Market, connect with local sellers and find authentic, homegrown products that celebrate our region's rich culture. Whether you're here to browse unique items or grow your small business, our platform makes it easy for both buyers and sellers to thrive.
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

                <h2 class="text-3xl font-bold text-gray-800 mb-1">Welcome Back</h2>
                <p class="text-sm text-gray-500 mb-10">Please log in to access your account, whether you're a buyer ready to explore local goods or a seller managing your listings.</p>

                <!-- Login Form -->
                <form method="POST" action="#" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-gray-700 font-semibold">Email address</label>
                        <input id="email" name="email" type="email" required
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400"
                               placeholder="Email address" />
                    </div>

                    <div>
                        <label for="password" class="flex items-center justify-between mb-2 text-gray-700 font-semibold">
                            <span>Password</span>
                        </label>
                        <input id="password" name="password" type="password" required
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400"
                               placeholder="Password" />
                        <div class="text-right mt-2">
                            <a href="{{ route('password.email') }}" class="text-sm text-gray-500 hover:underline">Forgot password?</a>

                        </div>
                    </div>

                    <!-- Login Button -->
                    <div>
                        <button type="submit"
                                class="w-full py-3 bg-[#5e5359] hover:bg-[#4e464d] text-white font-semibold rounded transition">
                            Login
                        </button>
                    </div>
                </form>

                <!-- Or login with -->
                <!-- <div class="flex items-center my-6">
                    <div class="flex-grow h-px bg-gray-200"></div>
                    <span class="text-sm text-gray-500 mx-4">Or Login with</span>
                    <div class="flex-grow h-px bg-gray-200"></div>
                </div> -->

                <!-- <div class="grid grid-cols-2 gap-4">
                    <button class="border border-gray-300 rounded py-2 flex items-center justify-center text-gray-700 hover:bg-gray-50">
                        <img src="{{ asset('img/google-logo.png') }}" alt="Google Logo" class="w-4 h-4 mr-2"/> Google
                    </button>
                    <button class="border border-gray-300 rounded py-2 flex items-center justify-center text-gray-700 hover:bg-gray-50">
                        <img src="{{ asset('img/facebook-logo.png') }}" alt="Facebook Logo" class="w-4 h-4 mr-2"/> Facebook
                    </button>
                </div> -->

                <p class="text-center text-sm text-gray-500 mt-8">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-[#5e5359] font-semibold hover:underline">Sign up</a>  or 
                    <a href="{{ route('seller.register') }}" class="text-[#5e5359] font-semibold hover:underline">Register as a Seller</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
