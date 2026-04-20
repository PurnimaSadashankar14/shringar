@extends('layouts.app')
@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Packages</h1>
<hr class="h-1 bg-red-500">

<div class="text-right my-5">
    <a href="{{ route('package.create') }}" class="bg-blue-900 text-white px-5 py-3 rounded-lg">Add Package</a>
</div>

<table class="w-full mt-5 border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border p-2">S.N</th>
            <th class="border p-2">Package Image</th>
            <th class="border p-2">Package Name</th>
            <th class="border p-2">Description</th>
            <th class="border p-2">Inclusions</th>
            <th class="border p-2">Price</th>
            <th class="border p-2">Discounted Price</th>
            <th class="border p-2">Status</th>
            <th class="border p-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($packages as $package)
        <tr class="hover:bg-gray-100">
            <td class="border p-2 text-center">{{ $loop->iteration }}</td>
            <td class="border p-2 text-center">
                <img src="{{ asset('images/packages/'.$package->photopath) }}" alt="" class="w-16 h-16 rounded-lg">
            </td>
            <td class="border p-2">{{ $package->name }}</td>
            <td class="border p-2 mydescription">{!! $package->description !!}</td>
            <td class="border p-2">
                @php
                    $inclusions = array_filter(explode("\n", $package->inclusions)); // Remove empty values
                @endphp
                @if (!empty($inclusions))
                    <ul class="list-disc pl-5">
                        @foreach ($inclusions as $inclusion)
                            <li>{{ trim($inclusion) }}</li>
                        @endforeach
                    </ul>
                @else
                    <span class="text-gray-400">No inclusions available</span>
                @endif
            </td>
            <td class="border p-2">{{ $package->price }}</td>
            <td class="border p-2">{{ $package->discounted_price }}</td>
            <td class="border p-2">{{ $package->status }}</td>
            <td class="border p-2 text-center">
                <a href="{{ route('package.edit', $package->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded">Edit</a>
                <form action="{{ route('package.destroy', $package->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded mt-2" onclick="return confirm('Are you sure to Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
