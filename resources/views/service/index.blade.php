@extends('layouts.app')
@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Services</h1>
<hr class="h-1 bg-red-500">

<div class="text-right my-5">
    <a href="{{ route('service.create') }}" class="bg-blue-900 text-white px-5 py-3 rounded-lg">Add Service</a>
</div>

<table class="w-full mt-5">
    <tr>
        <th class="border p-2 bg-gray-200">S.N</th>
        <th class="border p-2 bg-gray-200">Service Image</th>
        <th class="border p-2 bg-gray-200">Service Name</th>
        <th class="border p-2 bg-gray-200">Description</th>
        <th class="border p-2 bg-gray-200">Price</th>
        <th class="border p-2 bg-gray-200">Discounted Price</th>
        <th class="border p-2 bg-gray-200">Status</th>
        <th class="border p-2 bg-gray-200">Action</th>
    </tr>
    @foreach($services as $service)
    <tr>
        <td class="border p-2">{{ $loop->iteration }}</td>
        <td class="border p-2">
            <img src="{{asset('images/services/'.$service->photopath)}}" alt="" class="w-16 h-16">
        </td>
        <td class="border p-2">{{ $service->name }}</td>
        <td class="border p-2 mydescription">{{ $service->description}}</td>
        <td class="border p-2">{{ $service->price }}</td>
        <td class="border p-2">{{ $service->discounted_price }}</td>
        <td class="border p-2">{{ $service->status }}</td>
        <td class="border p-2">
            <a href="{{route('service.edit', $service->id)}}" class="bg-blue-600 text-white px-3 py-1 rounded">Edit</a>
            <form action="{{ route('service.destroy', $service->id)}}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-1 py-1 mt-2 rounded" onclick="return confirm('Are you sure to Delete?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
