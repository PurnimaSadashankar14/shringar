@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold text-center text-blue-900 mb-6">Edit Service</h1>
    <hr class="h-1 bg-red-500">

    <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <!-- Service Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Service Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $service->name) }}"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2"
                placeholder="Enter Service Name" required>
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="3"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2"
                placeholder="Enter a detailed description">{{ old('description', $service->description) }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" id="price" name="price" value="{{ old('price', $service->price) }}"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2"
                placeholder="Enter Price" required>
            @error('price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Discounted Price -->
        <div class="mb-4">
            <label for="discounted_price" class="block text-sm font-medium text-gray-700">Discounted Price</label>
            <input type="number" id="discounted_price" name="discounted_price" value="{{ old('discounted_price', $service->discounted_price) }}"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2"
                placeholder="Enter Discounted Price">
            @error('discounted_price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select id="status" name="status"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2">
                <option value="Show" {{ old('status', $service->status) === 'Show' ? 'selected' : '' }}>Show</option>
                <option value="Hide" {{ old('status', $service->status) === 'Hide' ? 'selected' : '' }}>Hide</option>
            </select>
            @error('status')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
            <input type="file" id="image" name="photopath" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:border-blue-500">
            @if($service->photopath)
            <p class="text-sm text-gray-600 mt-2">Current Image: <a href="{{ asset('storage/' . $service->photopath) }}" target="_blank" class="text-blue-500 underline">View</a></p>
            @endif
            @error('photopath')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex justify-center gap-4 mt-4">
            <button type="submit"
                class="bg-blue-500 text-white font-medium px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition duration-200 focus:outline-none focus:ring focus:ring-blue-300">
                Update Service
            </button>
            <a href="{{ route('service.index') }}"
                class="bg-gray-500 text-white font-medium px-4 py-2 rounded-lg shadow hover:bg-gray-600 transition duration-200 focus:outline-none focus:ring focus:ring-gray-300">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
    tinymce.init({
        selector: 'textarea',
        plugins: [
            'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            'checklist mediaembed casechange export formatpainter pageembed a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
            'importword exportword exportpdf'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    });
</script>
@endsection
