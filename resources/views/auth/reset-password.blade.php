<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Reset Password - Mindanao Market</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <!-- Outer Container -->
        <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden max-w-5xl w-full flex">
            <!-- Left Panel (Same styling as login/register) -->
            <div class="w-1/2 relative p-10 flex flex-col justify-center"
                 style="background: linear-gradient(to bottom right, #c8b6bd, #5e5359); border-top-left-radius: 2rem; border-bottom-left-radius: 2rem;">
                <h1 class="text-4xl font-bold text-white mb-4">
                    Regain Access to Your Account
                </h1>
                <p class="text-white text-sm mb-8">
                    Forgot your password? Reset it here and continue exploring or selling authentic local products at Mindanao Market.
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

                <h2 class="text-3xl font-bold text-gray-800 mb-1">Reset Your Password</h2>
                <p class="text-sm text-gray-500 mb-10">
                    Enter your email and new password details below to regain access to your account.
                </p>

                <!-- Password Reset Form -->
                <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                    @csrf

                    <!-- Token (Hidden) -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block mb-2 text-gray-700 font-semibold">Email</label>
                        <input id="email" name="email" type="email" 
                               value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400" 
                               placeholder="Email Address" />
                        @error('email')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block mb-2 text-gray-700 font-semibold">New Password</label>
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400" 
                               placeholder="New Password" />
                        @error('password')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-gray-700 font-semibold">Confirm New Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                               class="w-full px-4 py-3 border border-gray-300 rounded 
                                      focus:border-[#5e5359] focus:ring-1 focus:ring-[#5e5359] outline-none placeholder-gray-400" 
                               placeholder="Confirm New Password" />
                        @error('password_confirmation')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Reset Password Button -->
                    <div>
                        <button type="submit"
                                class="w-full py-3 bg-[#5e5359] hover:bg-[#4e464d] text-white font-semibold rounded transition">
                            Reset Password
                        </button>
                    </div>
                </form>

                <p class="text-center text-sm text-gray-500 mt-8">
                    Remembered your credentials? 
                    <a href="{{ route('login') }}" class="text-[#5e5359] font-semibold hover:underline">Log in</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
