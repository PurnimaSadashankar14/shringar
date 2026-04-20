@extends('layouts.master')
@section('content')

<div class="container mx-auto py-12 min-h-screen">
    <!-- Card Container -->
    <div class="max-w-full mx-auto bg-white rounded-xl shadow-xl overflow-hidden flex flex-col lg:flex-row h-full">

        <!-- Left Section: Image, Name, Price, Book Now Button -->
        <div class="w-full lg:w-1/2 relative bg-gradient-to-b from-pink-300 to-pink-500 text-white">
            <img src="{{ asset('images/packages/' . $package->photopath) }}" alt="{{ $package->name }}"
                 class="w-full h-full object-cover opacity-70">
            <div class="absolute top-0 left-0 right-0 bottom-0 flex flex-col justify-center items-center p-8">
                <h1 class="text-4xl font-extrabold text-center mb-4 shadow-md">{{ $package->name }}</h1>
                <div class="text-center mb-6 shadow-md">
                    <span class="bg-white text-pink-700 px-6 py-3 rounded-full text-lg font-semibold">
                        Price: ${{ number_format($package->price, 2) }}
                    </span>
                </div>
                <div class="flex justify-center mt-6">
                    <a href="{{ route('booking.create', $package->id) }}"
                       class="bg-white text-pink-700 px-8 py-4 rounded-lg font-bold hover:bg-pink-100 transition duration-300 shadow-lg">
                        Book Now
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Section: Description and Extra Information -->
        <div class="w-full lg:w-1/2 bg-gray-100 p-12 flex flex-col justify-center items-start space-y-6">
            <h2 class="text-3xl font-bold text-pink-700 mb-4">Package Details</h2>
            <p class="text-gray-700 leading-relaxed text-lg">
                {{ $package->description }}
            </p>

            <!-- Optional: Add more info like reviews, features, etc. -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold text-pink-700 mb-4">Inclusions:</h3>
                <ul class="list-disc pl-5 text-gray-600 space-y-2">
                    @php
                        $inclusions = array_filter(explode("\n", $package->inclusions)); // Convert inclusions to array & remove empty values
                    @endphp
                    @if (!empty($inclusions))
                        @foreach ($inclusions as $inclusion)
                            <li>{{ trim($inclusion) }}</li>
                        @endforeach
                    @else
                        <li class="text-gray-400">No inclusions available</li>
                    @endif
                </ul>
            </div>

            </div>
        </div>

    </div>
</div>

@endsection
