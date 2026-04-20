@extends('layouts.master')

@section('content')
<div class="px-16 py-8">
    <!-- Header Section -->
    <div class="border-l-4 border-blue-900 pl-4 mb-6">
        <h1 class="text-3xl font-bold text-gray-800 font-exo">Search Results</h1>
        <p class="text-gray-600 font-roboto">Results for "<span class="font-semibold text-blue-800">{{ $query }}</span>"</p>
    </div>

    <!-- Results Section -->
    <div class="space-y-16">
        <!-- Packages Section -->
        @if($packages->isNotEmpty())
        <div>
            <h2 class="text-2xl font-bold text-gray-800 border-b pb-2 mb-6 font-exo">💄 Packages</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($packages as $package)
                <div class="group relative">
                    <a href="{{ route('package.show', $package->id) }}">
                        <div class="relative bg-gray-100 rounded-lg shadow-md overflow-hidden">
                            <img
                                src="{{ asset('images/packages/'.$package->photopath) }}"
                                alt="{{ $package->name }}"
                                class="h-64 w-full object-cover transition-transform duration-300 group-hover:scale-105"
                            />
                            <div class="p-4">
                                <h1 class="text-lg font-semibold text-gray-800 font-roboto">{{ $package->name }}</h1>
                                <ul class="list-disc pl-5 text-gray-600 mt-2 space-y-1 text-sm">
                                    @php
                                        $inclusions = array_filter(explode("\n", $package->inclusions));
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
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Services Section -->
        @if($services->isNotEmpty())
        <div>
            <h2 class="text-2xl font-bold text-gray-800 border-b pb-2 mb-6 font-exo">💆‍♀️ Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($services as $service)
                <div class="group relative">
                    <a href="{{ route('service.show', $service->id) }}">
                        <div class="relative bg-gray-100 rounded-lg shadow-md overflow-hidden">
                            <img
                                src="{{ asset('images/services/'.$service->photopath) }}"
                                alt="{{ $service->name }}"
                                class="h-64 w-full object-cover transition-transform duration-300 group-hover:scale-105"
                            />
                            <div class="p-4">
                                <h1 class="text-lg font-semibold text-gray-800 font-roboto">{{ $service->name }}</h1>
                                <p class="text-gray-600 text-sm mt-2 font-roboto">{{ Str::limit($service->description, 80) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- No Results Found -->
        @if ($packages->isEmpty() && $services->isEmpty())
        <div class="text-center py-20">
            <h1 class="text-2xl font-bold text-gray-800 font-exo">No Results Found</h1>
            <p class="text-gray-600 mt-4 font-roboto">Try searching with different keywords.</p>
        </div>
        @endif
    </div>
</div>
@endsection
