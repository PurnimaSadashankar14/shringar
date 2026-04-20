@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Edit Booking</h2>
    <p class="text-gray-600 text-center mb-6">Modify booking details and save changes.</p>

    {{-- Display Errors --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Booking Edit Form --}}
    <form action="{{ route('booking.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Choose Package or Service --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Booking Type</label>
            <select id="booking_type" name="booking_type" class="form-control w-full px-3 py-2 border rounded" onchange="togglePackageService()">
                <option value="package" {{ $booking->package_id ? 'selected' : '' }}>Package</option>
                <option value="service" {{ $booking->service_id ? 'selected' : '' }}>Service</option>
            </select>
        </div>

        {{-- Package Details (Visible if Booking Type is "Package") --}}
        <div id="package_section" class="mb-4 {{ $booking->service_id ? 'hidden' : '' }}">
            <label class="block text-gray-700 font-semibold">Package Name</label>
            <input type="text" name="package_name" class="form-control w-full px-3 py-2 border rounded"
                   value="{{ old('package_name', $booking->package->name ?? '') }}">
        </div>

        {{-- Service Details (Visible if Booking Type is "Service") --}}
        <div id="service_section" class="mb-4 {{ $booking->package_id ? 'hidden' : '' }}">
            <label class="block text-gray-700 font-semibold">Service Name</label>
            <input type="text" name="service_name" class="form-control w-full px-3 py-2 border rounded"
                   value="{{ old('service_name', $booking->service->name ?? '') }}">
        </div>

        {{-- Client Information --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold">Client Name</label>
                <input type="text" name="name" class="form-control w-full px-3 py-2 border rounded"
                       value="{{ old('name', $booking->name) }}" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Email</label>
                <input type="email" name="email" class="form-control w-full px-3 py-2 border rounded"
                       value="{{ old('email', $booking->email) }}" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Phone</label>
            <input type="text" name="phone" class="form-control w-full px-3 py-2 border rounded"
                   value="{{ old('phone', $booking->phone) }}" required>
        </div>

        {{-- Booking Schedule --}}
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Booking Date</label>
                <input type="date" id="booking_date" name="booking_date" class="form-control w-full px-3 py-2 border rounded"
                       value="{{ old('booking_date', $booking->booking_date) }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Booking Time</label>
                <select id="booking_time" name="booking_time" class="form-control w-full px-3 py-2 border rounded" required>
                    <option value="">Select a time</option>
                    {{-- Options will be dynamically populated --}}
                </select>
            </div>

            <script>
                document.getElementById('booking_date').addEventListener('change', function () {
                    let date = this.value;
                    let timeDropdown = document.getElementById('booking_time');
                    timeDropdown.innerHTML = '<option value="">Loading...</option>';

                    fetch(`/available-slots?date=${date}`)
                        .then(response => response.json())
                        .then(slots => {
                            timeDropdown.innerHTML = '<option value="">Select a time</option>';
                            slots.forEach(slot => {
                                let option = document.createElement('option');
                                option.value = slot;
                                option.textContent = slot;
                                timeDropdown.appendChild(option);
                            });
                        });
                });
            </script>

        </div>

        {{-- Skin Type Selection --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Skin Type</label>
            <select name="skin_type" class="form-control w-full px-3 py-2 border rounded">
                <option value="Normal" {{ $booking->skin_type == 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="Oily" {{ $booking->skin_type == 'Oily' ? 'selected' : '' }}>Oily</option>
                <option value="Dry" {{ $booking->skin_type == 'Dry' ? 'selected' : '' }}>Dry</option>
                <option value="Combination" {{ $booking->skin_type == 'Combination' ? 'selected' : '' }}>Combination</option>
                <option value="Sensitive" {{ $booking->skin_type == 'Sensitive' ? 'selected' : '' }}>Sensitive</option>
            </select>
        </div>

        {{-- Appointment Status --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Appointment Status</label>
            <select name="status" class="form-control w-full px-3 py-2 border rounded">
                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>


        {{-- Action Buttons --}}
        <div class="mt-6 flex justify-between">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200">
                Update Booking
            </button>
            <a href="{{ route('booking.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-200">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
    function togglePackageService() {
        let bookingType = document.getElementById('booking_type').value;
        let packageSection = document.getElementById('package_section');
        let serviceSection = document.getElementById('service_section');

        if (bookingType === 'package') {
            packageSection.classList.remove('hidden');
            serviceSection.classList.add('hidden');
        } else {
            serviceSection.classList.remove('hidden');
            packageSection.classList.add('hidden');
        }
    }
</script>
@endsection
