@extends('layouts.master')
@section('content')

<!-- Title Section -->
<div class="text-center py-16 bg-white shadow-xl rounded-b-3xl">
    <h1 class="text-6xl font-extrabold text-gray-800 tracking-wide drop-shadow-xl">
        "Beauty Begins the Moment You Decide to Be Yourself"
    </h1>
    <p class="mt-4 text-2xl text-gray-600 font-serif italic">
        Choose from our curated packages and let us help you shine on your special day!
    </p>
</div>

<!-- Main Content Section -->
<div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 items-center px-4 lg:px-0 py-10">
    <!-- Left Side: Bride Image Slider -->
    <div class="flex justify-center">
        <div id="bride-slider" class="relative w-full lg:w-2/3 h-64 overflow-hidden rounded-2xl shadow-2xl">
            <div class="slider-inner flex transition-transform duration-500 ease-in-out">
                <img src="{{asset('images/bride3.png')}}" alt="Bride Image 1" class="w-full h-full object-cover flex-shrink-0">
                <img src="{{asset('images/bride2.png')}}" alt="Bride Image 2" class="w-full h-full object-cover flex-shrink-0">
                <img src="{{asset('images/bride5.png')}}" alt="Bride Image 3" class="w-full h-full object-cover flex-shrink-0">
            </div>
        </div>
    </div>

    <!-- Right Side: Description -->
    <div class="bg-white p-8 rounded-2xl shadow-2xl text-gray-800">
        <h2 class="text-3xl font-extrabold tracking-wide mb-6">Bridal Makeup Packages</h2>
        <p class="text-lg leading-relaxed">
            Get Ready to Flaunt Your Stellar Bridal Look on Your Wedding Day! At HD Makeover, we bring you top-notch wedding makeup artists and a variety of bridal makeup packages tailored to make you look breathtaking on your big day.
        </p>
    </div>

    <!-- Slider Script -->
    <script>
        const slider = document.querySelector('#bride-slider .slider-inner');
        let index = 0;

        function slideImages() {
            index = (index + 1) % slider.children.length;
            slider.style.transform = `translateX(-${index * 100}%)`;
        }

        setInterval(slideImages, 3000);
    </script>
</div>

<!-- Package List Section -->
<div class="container mx-auto py-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($packages as $package)
    <div class="relative bg-gradient-to-r from-pink-500 via-rose-400 to-pink-500 p-8 rounded-3xl shadow-2xl border-4 border-transparent hover:shadow-xl hover:border-rose-500 transform transition-all duration-300 hover:scale-105">
        <h3 class="text-3xl font-extrabold text-white tracking-wide">{{ $package->name }}</h3>
        <ul class="mt-5 space-y-2 text-white font-medium">
            @php
                $inclusions = array_filter(explode("\n", $package->inclusions)); // Convert inclusions to array & remove empty values
            @endphp
            @if (!empty($inclusions))
                @foreach ($inclusions as $inclusion)
                    <li class="transition-all duration-300 hover:text-pink-200">• {{ trim($inclusion) }}</li>
                @endforeach
            @else
                <li class="text-gray-300">No inclusions available</li>
            @endif
        </ul>

        <!-- Booking Form -->
        <form action="{{ route('booking.create', ['id' => $package->id, 'type' => 'package']) }}" method="GET">
            <button type="submit" class="inline-block bg-rose-500 text-white px-8 py-3 rounded-lg mt-6 hover:bg-rose-600 transition duration-300 transform hover:scale-105">
                Book Now
            </button>
        </form>
    </div>
    @endforeach
</div>




@endsection
