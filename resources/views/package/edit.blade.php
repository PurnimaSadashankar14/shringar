@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Edit Package</h1>
    <hr class="h-1 bg-red-500">

    <form action="{{ route('package.update', $package->id) }}" method="POST" enctype="multipart/form-data" class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <!-- Package Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Package Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $package->name) }}"
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
                placeholder="Enter a detailed description">{{ old('description', $package->description) }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Inclusions -->
        <div class="mb-4">
            <label for="inclusions" class="block text-sm font-medium text-gray-700">Inclusions</label>
            <textarea id="inclusions" name="inclusions" rows="4"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                placeholder="Enter inclusions">{{ old('inclusions', $package->inclusions) }}</textarea>
            @error('inclusions')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>


        <!-- Price -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" id="price" name="price" value="{{ old('price', $package->price) }}"
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
                <option value="Show" {{ old('status', $package->status) === 'Show' ? 'selected' : '' }}>Show</option>
                <option value="Hide" {{ old('status', $package->status) === 'Hide' ? 'selected' : '' }}>Hide</option>
            </select>
            @error('status')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Current Image</label>
            <div class="mb-2">
                <img src="{{ asset('images/packages/' . $package->photopath) }}" alt="Package Image" class="h-32 w-32 object-cover rounded-md">
            </div>
            <label for="image" class="block text-sm font-medium text-gray-700">Upload New Image (optional)</label>
            <input type="file" id="image" name="photopath" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:border-blue-500">
            @error('photopath')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex justify-center gap-4 mt-6">
            <button type="submit"
                class="bg-blue-500 text-white font-medium px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                Update Package
            </button>
            <a href="{{ route('package.index') }}"
                class="bg-gray-500 text-white font-medium px-6 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring focus:ring-gray-300">
                Cancel
            </a>
        </div>
    </form>
</div>


<script>
    tinymce.init({
  selector: 'textarea',
  plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      // Your account includes a free trial of TinyMCE premium features
      // Try the most popular premium features until Dec 18, 2024:
      'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      // Early access to document converters
      'importword', 'exportword', 'exportpdf'
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
