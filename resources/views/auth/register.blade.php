@extends('layouts.master')  {{-- Extending the master layout --}}

@section('content')
<div class="flex justify-center items-center min-h-screen w-full bg-[#111827]">
    <div class="w-[450px] bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-3xl font-bold text-center text-gray-800">Create Your Account</h2>
        <p class="text-center text-gray-500 mb-6">Join us and enjoy our services</p>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-gray-700 font-medium">Full Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none"
                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-gray-700 font-medium">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-gray-700 font-medium">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none">
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('login') }}" class="text-sm text-purple-500 hover:underline">
                    Already have an account? Login
                </a>
                <button type="submit"
                    class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-6 rounded-lg transition">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
