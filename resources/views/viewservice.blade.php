@extends('layouts.master')
@section('content')

<div class="container mx-auto py-12 min-h-screen">
    <!-- Card Container -->
    <div class="max-w-full mx-auto bg-white rounded-xl shadow-xl overflow-hidden flex flex-col lg:flex-row h-full">

        <!-- Left Section: Image, Name, Price, Book Now Button -->
        <div class="w-full lg:w-1/2 relative bg-gradient-to-b from-pink-300 to-pink-500 text-white">
            <img src="{{ asset('images/services/' . $service->photopath) }}" alt="{{ $service->name }}"
                 class="w-full h-full object-cover opacity-70">
            <div class="absolute top-0 left-0 right-0 bottom-0 flex flex-col justify-center items-center p-8">
                <h1 class="text-4xl font-extrabold text-center mb-4 shadow-md">{{ $service->name }} </h1>
                <div class="text-center mb-6 shadow-md">
                    <span class="bg-white text-pink-700 px-6 py-3 rounded-full text-lg font-semibold">
                        Price: ${{ number_format($service->price, 2) }}
                    </span>
                </div>
                <div class="flex justify-center mt-6">
                    <a href="{{ route('booking.create', ['id' => $service->id, 'type' => 'service']) }}"
                        class="inline-block bg-pink-700 text-white px-6 py-2 rounded hover:bg-pink-800 transition duration-300">
                        Book Now
                     </a>
                </div>
            </div>
        </div>

        <!-- Right Section: Description and Extra Information -->
        <div class="w-full lg:w-1/2 bg-gray-100 p-12 flex flex-col justify-center items-start space-y-6">
            <h2 class="text-3xl font-bold text-pink-700 mb-4">Service Details</h2>
            <p class="text-gray-700 leading-relaxed text-lg">
                {{ $service->description }}
            </p>

            <!-- Optional: Add more info like reviews, features, etc. -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold text-pink-700 mb-4">Features:</h3>
                <ul class="list-disc pl-5 text-gray-600 space-y-2">
                    <li>Feature 1</li>
                    <li>Feature 2</li>
                    <li>Feature 3</li>
                    <li>Feature 4</li>
                </ul>
            </div>
        </div>

    </div>
</div>

@endsection
