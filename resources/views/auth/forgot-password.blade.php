<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Forgot Password - Mindanao Market</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-[2rem] shadow-xl overflow-hidden max-w-lg w-full p-10">
            <!-- Logo & Brand Name -->
            <div class="flex items-center space-x-3 mb-8 justify-center">
                <div class="w-10 h-10 flex items-center justify-center bg-[#5e5359] rounded-full">
                    <img src="{{ asset('img/logo3.png') }}" alt="Mindanao Market Logo" class="w-6 h-6 object-contain"/>
                </div>
                <span class="font-bold text-gray-800 text-lg">Mindanao Market</span>
            </div>

            <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center">Forgot Your Password?</h2>
            <p class="text-sm text-gray-500 mb-10 text-center">
                Enter your email address below and we'll send you a link to reset your password.
            </p>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Forgot Password Form -->
            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

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

                <div>
                    <button type="submit"
                            class="w-full py-3 bg-[#5e5359] hover:bg-[#4e464d] text-white font-semibold rounded transition">
                        Send Password Reset Link
                    </button>
                </div>
            </form>

            <p class="text-center text-sm text-gray-500 mt-8">
                Remembered your credentials?
                <a href="{{ route('login') }}" class="text-[#5e5359] font-semibold hover:underline">Log in</a>
            </p>
        </div>
    </div>
</body>
</html>
