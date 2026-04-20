@extends('layouts.master')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-96 bg-white p-8 rounded-lg shadow-lg border">
            <!-- Heading -->
            <h1 class="text-3xl font-bold text-center text-blue-900">Welcome Back!</h1>
            <p class="text-center text-gray-600 mt-2">Login to your account</p>

            <!-- Form -->
            <form action="{{ route('login') }}" method="POST" class="mt-6 space-y-4">
                @csrf

                <!-- Email Input -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                    <div class="relative">
                        <input type="email" name="email" id="email"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Enter your email" required>
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Enter your password" required>
                        <button type="button" class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600"
                                onclick="togglePasswordVisibility()">
                            <i id="password-icon" class="fas fa-eye"></i>
                        </button>
                        @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Forgot Password -->
                <div class="text-right">
                    <a href="{{ route('password.request') }}" class="text-blue-500 text-sm hover:underline">
                        Forgot Password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-pink-600 text-white font-semibold rounded-lg px-4 py-2 hover:bg-gray-300 transition duration-200">
                    Login
                </button>
            </form>

            <!-- Divider -->
            <div class="flex items-center justify-center mt-6">
                <span class="h-px w-full bg-gray-300"></span>
                <span class="text-gray-500 px-4 text-sm">or</span>
                <span class="h-px w-full bg-gray-300"></span>
            </div>

            <!-- Social Logins -->
            <div class="flex justify-center mt-4 space-x-4">
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-blue-50 hover:bg-blue-100 rounded-full">
                    <i class="fab fa-google text-red-500"></i>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-blue-50 hover:bg-blue-100 rounded-full">
                    <i class="fab fa-facebook-f text-blue-700"></i>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-blue-50 hover:bg-blue-100 rounded-full">
                    <i class="fab fa-twitter text-blue-500"></i>
                </a>
            </div>

            <!-- Register Link -->
            <p class="text-center text-gray-600 mt-6">
                Don’t have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign up</a>
            </p>
        </div>
    </div>

    <!-- Password Toggle Script -->
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const icon = document.getElementById('password-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
@endsection
