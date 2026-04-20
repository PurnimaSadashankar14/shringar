@extends('layouts.master')

@section('content')
<div id="bookingFormContainer" class="w-full mt-1 bg-white p-6 rounded-lg shadow-lg">
    <!-- Header Section -->

        <div class="relative w-full h-[600px] mb-10">
            <img src="{{ asset('images/banner3.jpg') }}" alt="Banner Image" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white text-center">
                <h1 class="text-3xl font-bold mb-4">"Creating Timeless Looks with a Touch of Art"</h1>
                <p class="mb-6">Bridal Makeup | Party Makeup | Hair Styling | Makeover Packages</p>
                <a href="#" class="bg-sky-600 text-white px-4 py-2 rounded-md no-underline hover:bg-sky-400 transition duration-300">Explore Services</a>
            </div>
        </div>

    <div class="md:w-1/2 text-center md:text-left">
        <h1 class="text-3xl font-bold text-gray-800 leading-tight">
            High-end <span class="text-pink-600">salon and makeup</span>
        </h1>
        <p class="mt-4 text-gray-600">
            Welcoming environment where you can enjoy the professionalism, warm and energetic atmosphere provided by the service of highly experienced team in the heart of Kathmandu city.
        </p>
        <a href="#"
           class="inline-block mb-5 mt-6 px-4 py-2 border-2 border-pink-500 text-pink-500 hover:bg-pink-500 hover:text-white font-semibold rounded transition">
            Explore Shrinagar World
        </a>
    </div>

    <!-- Right Image -->


   <!-- Title Section for Packages -->
   <div class="border-l-4 border-pink-500 pl-4 mb-6">
    <h1 class="text-4xl font-extrabold text-pink-700">Our Makeup Packages</h1>
    <p class="text-pink-600 font-medium text-base">Explore our curated makeup packages tailored for different occasions!</p>
</div>

<!-- Package Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-10">
    @foreach($packages as $package)
        <div class="w-full h-[500px] border rounded-lg {{ $package->status === 'Show' ? 'bg-pink-50' : 'bg-gray-50' }} shadow-lg transition-transform transform hover:scale-105 hover:rotate-1 duration-500 ease-in-out mx-auto">
            <img src="{{ asset('images/packages/' . $package->photopath) }}" alt="{{ $package->name }}" class="w-full h-[300px] object-cover rounded-t-lg">
            <div class="p-5 flex flex-col justify-between h-[200px]">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">{{ $package->name }}</h2>
                </div>
                <div class="mt-3">
                    <p class="font-semibold text-pink-700 text-lg">Price: ${{ $package->price }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('booking.create', $package->id) }}"
                            class="inline-block bg-pink-700 text-white px-6 py-2 rounded hover:bg-pink-800 transition duration-300">
                            Book Now
                        </a>
                        <a href="{{ route('package.show', $package->id) }}"
                            class="inline-block border border-pink-700 text-pink-700 px-6 py-2 rounded hover:bg-pink-700 hover:text-white transition duration-300">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>



<!-- Title Section for Services -->
<div class="border-l-4 border-pink-500 pl-4 mb-6 mt-6">
    <h1 class="text-4xl font-extrabold text-pink-700">Our Services</h1>
    <p class="text-pink-600 font-medium text-base">Explore our Services tailored for different occasions!</p>
</div>

<!-- Service Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($services as $service)
        <div class="w-full h-[500px] border rounded-lg {{ $service->status === 'Show' ? 'bg-white hover:bg-gray-100' : 'bg-gray-50 hover:bg-gray-100' }} shadow-lg transition-transform transform hover:scale-105 duration-300 ease-in-out mx-auto">
            <img src="{{ asset('images/services/' . $service->photopath) }}" alt="{{ $service->name }}" class="w-full h-[300px] object-cover rounded-t-lg">
            <div class="p-5 flex flex-col justify-between h-[200px]">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">{{ $service->name }}</h2>
                </div>
                <div class="mt-3">
                    <p class="font-semibold text-gray-800 text-lg">Price: ${{ $service->price }}</p>
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









@endsection
