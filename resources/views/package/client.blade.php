<!-- Title Section -->
<div class="border-l-4 border-pink-500 pl-4 mb-8">
    <h1 class="text-5xl font-extrabold text-pink-700">Our Makeup Packages</h1>
    <p class="text-pink-600 font-medium text-lg">Explore our curated makeup packages tailored for different occasions!</p>
</div>

<!-- Package Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    @foreach($packages as $package)
        <div class="border rounded-lg bg-pink-50 hover:bg-pink-100 shadow-lg transition-transform transform hover:scale-105 hover:rotate-1 duration-500 ease-in-out">
            <img src="{{ asset('images/packages/' . $package->photopath) }}" alt="{{ $package->name }}" class="w-full h-64 object-cover rounded-t-lg">
            <div class="p-4">
                <h2 class="text-2xl font-bold">{{ $package->name }}</h2>
                <p class="mt-2 text-gray-700">{{ $package->description }}</p>
                <p class="mt-4 font-semibold text-pink-700">Price: ${{ $package->price }}</p>
                <div class="flex justify-center items-center space-x-4 mt-4">
                    <a href="{{ route('booking.create', $package->id) }}"
                       class="inline-block text-center bg-pink-700 text-white px-6 py-2 rounded hover:bg-pink-800 transition duration-300">
                        Book Now
                    </a>
                    <a href="{{ route('package.show', $package->id) }}"
                       class="inline-block text-center border border-pink-700 text-pink-700 px-6 py-2 rounded hover:bg-pink-700 hover:text-white transition duration-300">
                        Read more
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
