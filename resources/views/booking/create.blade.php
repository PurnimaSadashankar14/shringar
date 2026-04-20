@extends('layouts.master')
@section('content')

<div class="w-full max-w-lg mx-auto bg-white p-8 rounded-2xl shadow-xl transition-transform transform hover:scale-105">
    <h2 class="text-3xl font-bold text-center text-pink-600 mb-6">Book Now</h2>
    <form action="{{ route('booking.store', ['id' => $model->id, 'type' => $type]) }}" method="POST" class="space-y-4">
        @csrf
        @method('POST')

        <div>
            <label class="block text-gray-700 font-semibold">Package Name</label>
            <input type="text" name="package_name" class="form-control w-full px-4 py-2 border rounded-lg focus:ring focus:ring-pink-300" value="{{ old('package_name', $model->name) }}" required>
            @error('package_name') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Client Name</label>
            <input type="text" name="name" class="form-control w-full px-4 py-2 border rounded-lg focus:ring focus:ring-pink-300" value="{{ old('name') }}" required>
            @error('name') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Email</label>
            <input type="email" name="email" class="form-control w-full px-4 py-2 border rounded-lg focus:ring focus:ring-pink-300" value="{{ old('email') }}" required>
            @error('email') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Phone</label>
            <input type="text" name="phone" class="form-control w-full px-4 py-2 border rounded-lg focus:ring focus:ring-pink-300" value="{{ old('phone') }}" required>
            @error('phone') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Skin Type</label>
            <select name="skin_type" class="form-control w-full px-4 py-2 border rounded-lg focus:ring focus:ring-pink-300" required>
                <option value="Normal" {{ old('skin_type') == 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="Oily" {{ old('skin_type') == 'Oily' ? 'selected' : '' }}>Oily</option>
                <option value="Dry" {{ old('skin_type') == 'Dry' ? 'selected' : '' }}>Dry</option>
                <option value="Combination" {{ old('skin_type') == 'Combination' ? 'selected' : '' }}>Combination</option>
                <option value="Sensitive" {{ old('skin_type') == 'Sensitive' ? 'selected' : '' }}>Sensitive</option>
            </select>
            @error('skin_type') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Booking Date</label>
            <input type="date" name="booking_date" class="form-control w-full px-4 py-2 border rounded-lg focus:ring focus:ring-pink-300" value="{{ old('booking_date') }}" required>
            @error('booking_date') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Booking Time</label>
            <select name="booking_time" class="form-control w-full px-4 py-2 border rounded-lg focus:ring focus:ring-pink-300" required>
                <option value="">Select a Time</option>
                @foreach ($availableSlots as $slot)
                    <option value="{{ $slot }}">{{ $slot }}</option>
                @endforeach
            </select>
            @error('booking_time') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg text-sm mt-2">
                <strong>Please fix the following errors:</strong>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex justify-between mt-6">
            <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-semibold px-6 py-2 rounded-lg transition-all transform hover:scale-105">Submit Booking</button>
            <a href="{{ route('booking.index') }}" class="text-gray-600 hover:text-gray-900 transition-all">Cancel</a>
        </div>
    </form>
</div>

@endsection
