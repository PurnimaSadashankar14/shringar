<!-- filepath: /d:/Appointment/Shringar/resources/views/services/index.blade.php -->
@extends('layouts.master')
@section('content')

<div class="container mx-auto py-12 min-h-screen">
    <!-- Title Section for Services -->
    <div class="border-l-4 border-pink-500 pl-4 mb-6 mt-6">
        <h1 class="text-4xl font-extrabold text-pink-700">Our Services</h1>
        <p class="text-pink-600 font-medium text-base">Explore our Services tailored for different occasions!</p>
    </div>

    <!-- Service Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($services as $service)
            <div class="w-full h-[500px] border rounded-lg bg-white hover:bg-gray-100 shadow-lg transition-transform transform hover:scale-105 duration-300 ease-in-out mx-auto">
                <img src="{{ asset('images/services/' . $service->photopath) }}" alt="{{ $service->name }}" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-5 flex flex-col justify-between h-[200px]">
                    <h2 class="text-xl font-bold text-gray-800">{{ $service->name }}</h2>
                    <p class="text-gray-700 leading-relaxed text-lg mt-2">{{ $service->description }}</p>
                    <div class="mt-3">
                        <p class="font-semibold text-pink-700 text-lg">Price: ${{ number_format($service->price, 2) }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ route('booking.create', ['id' => $service->id, 'type' => 'service']) }}"
                                class="inline-block bg-pink-700 text-white px-6 py-2 rounded hover:bg-pink-800 transition duration-300">
                                Book Now
                             </a>
                            <a href="{{ route('service.show', $service->id) }}"
                               class="inline-block border border-pink-700 text-pink-700 px-6 py-2 rounded hover:bg-pink-700 hover:text-white transition duration-300">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
