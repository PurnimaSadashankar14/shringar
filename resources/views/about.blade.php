@extends('layouts.master')

@section('content')
<div class="relative bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 text-white py-16 px-8">
    <div class="absolute inset-0 bg-opacity-50 bg-black"></div>
    <div class="relative z-10 text-center max-w-4xl mx-auto">
        <h1 class="text-5xl font-extrabold uppercase mb-4 tracking-widest animate-bounce">About Shringar</h1>
        <p class="text-lg opacity-90 leading-relaxed">A modern makeup appointment system designed to simplify bookings and enhance the experience for both artists and clients.</p>
    </div>
</div>

<div class="bg-gray-100 py-12">
    <div class="max-w-6xl mx-auto px-6 lg:px-12">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <!-- Left: Image -->
            <div class="relative">
                <img src="{{asset('images/smokey_eyes.png')}}" alt="Makeup Art" class="rounded-lg shadow-lg transform hover:scale-105 transition duration-500">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-black via-transparent to-transparent rounded-lg"></div>
            </div>

            <!-- Right: Content -->
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Vision</h2>
                <p class="text-gray-600 leading-relaxed">
                    Shringar was created to **empower makeup artists and clients** by providing a seamless online appointment booking system.
                    No more scheduling conflicts, missed appointments, or communication gaps—just **effortless beauty bookings.**
                </p>
                <ul class="mt-4 space-y-2">
                    <li class="flex items-center text-gray-700"><span class="text-pink-500 mr-2">✔</span> Easy & Fast Appointment Booking</li>
                    <li class="flex items-center text-gray-700"><span class="text-pink-500 mr-2">✔</span> Seamless Artist-Client Communication</li>
                    <li class="flex items-center text-gray-700"><span class="text-pink-500 mr-2">✔</span> Automatic Notifications & Reminders</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Why Choose Us Section -->
<div class="bg-white py-16">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold text-gray-900">Why Choose <span class="text-pink-500">Shringar?</span></h2>
        <div class="mt-6 grid md:grid-cols-3 gap-8">
            <div class="p-6 bg-gradient-to-r from-yellow-400 to-red-400 text-white rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold">User-Friendly</h3>
                <p class="text-sm mt-2">Simple and elegant interface for effortless navigation.</p>
            </div>
            <div class="p-6 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold">Time-Saving</h3>
                <p class="text-sm mt-2">No more long calls and wait times—book instantly!</p>
            </div>
            <div class="p-6 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold">Secure & Reliable</h3>
                <p class="text-sm mt-2">Data security and privacy for artists and clients.</p>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-gradient-to-r from-purple-700 to-pink-600 text-white py-12 text-center">
    <h2 class="text-4xl font-bold">Ready to Book Your Next Makeup Appointment?</h2>
    <p class="mt-4">Join Shringar and experience effortless beauty bookings.</p>
    <a href="{{ route('home') }}" class="mt-6 inline-block px-6 py-3 bg-white text-purple-700 font-semibold rounded-lg shadow-md hover:bg-gray-200 transition">Get Started</a>
</div>

@endsection
