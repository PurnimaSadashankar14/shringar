@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Create a New Package</h1>

    <form action="{{ route('package.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        @csrf

        <!-- Package Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Package Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                placeholder="Enter Package Name" required>
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="4"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                placeholder="Enter a detailed description">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Inclusions -->
        <div class="mb-4">
            <label for="inclusions" class="block text-sm font-medium text-gray-700">Inclusions</label>
            <textarea id="inclusions" name="inclusions" rows="4"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                placeholder="Enter inclusions">{{ old('inclusions') }}</textarea>
            @error('inclusions')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Price -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                placeholder="Enter Price" required>
            @error('price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Status -->
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select id="status" name="status"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="Show" {{ old('status') === 'Show' ? 'selected' : '' }}>Show</option>
                <option value="Hide" {{ old('status') === 'Hide' ? 'selected' : '' }}>Hide</option>
            </select>
            @error('status')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-4">

            <input type="file" id="image" name="photopath" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:border-blue-500">
            @error('photopath')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex justify-center gap-4 mt-6">
            <button type="submit"
                class="bg-blue-500 text-white font-medium px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                Create Package
            </button>
            <a href="{{ route('package.index') }}"
                class="bg-gray-500 text-white font-medium px-6 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring focus:ring-gray-300">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
