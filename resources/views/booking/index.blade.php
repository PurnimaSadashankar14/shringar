@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">All Bookings</h1>

    @if($bookings->isEmpty())
        <p class="text-gray-500">No bookings available.</p>
    @else
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 border-b text-left text-gray-600">Booking ID</th>
                        <th class="px-6 py-3 border-b text-left text-gray-600">Package</th>
                        <th class="px-6 py-3 border-b text-left text-gray-600">Service</th>
                        <th class="px-6 py-3 border-b text-left text-gray-600">Name</th>
                        <th class="px-6 py-3 border-b text-left text-gray-600">Email</th>
                        <th class="px-6 py-3 border-b text-left text-gray-600">Phone</th>
                        <th class="px-6 py-3 border-b text-left text-gray-600">Skin Type</th>
                        <th class="px-6 py-3 border-b text-left text-gray-600">Booking Date</th>
                        <th class="px-6 py-3 border-b text-left text-gray-600">Booking Time</th>
                        <th class="px-6 py-3 border-b text-left text-gray-600">Payment</th>
                        <th class="px-6 py-3 border-b text-left text-gray-600">Status</th>
                        <th class="px-6 py-3 border-b text-left text-gray-600">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($bookings as $booking)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 border-b">{{ $booking->id }}</td>
                            <td class="px-6 py-3 border-b">{{ $booking->package ? $booking->package->name : '-' }}</td>
                            <td class="px-6 py-3 border-b">{{ $booking->service ? $booking->service->name : '-' }}</td>
                            <td class="px-6 py-3 border-b">{{ $booking->name }}</td>
                            <td class="px-6 py-3 border-b">{{ $booking->email }}</td>
                            <td class="px-6 py-3 border-b">{{ $booking->phone }}</td>
                            <td class="px-6 py-3 border-b">{{ $booking->skin_type }}</td>
                            <td class="px-6 py-3 border-b">{{ $booking->booking_date }}</td>
                            <td class="px-6 py-3 border-b">{{ $booking->booking_time }}</td>
                            <td class="px-6 py-3 border-b">
                                {{ $booking->payment && $booking->payment > 0 ? 'Paid' : 'Unpaid' }}
                            </td>

                            <td class="px-6 py-3 border-b">
                                <form method="POST" action="{{ route('booking.updateStatus', ['id' => $booking->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="in_progress" {{ $booking->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="canceled" {{ $booking->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                    </select>
                                </form>
                            </td>


                            <td class="px-6 py-3 border-b">
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('booking.edit', ['id' => $booking->id]) }}" class="bg-purple-600 text-white px-3 py-1 rounded hover:bg-purple-700 transition">Edit</a>

                                    <button type="button" class="text-red-500" onclick="showPopup({{ $booking->id }})">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
{{-- Popup Modal --}}
<div class="fixed bg-gray-600 inset-0 bg-opacity-50 backdrop-blur-sm hidden items-center justify-center" id="popup">
    <form id="deleteForm" method="POST" class="bg-white px-10 py-5 rounded-lg text-center" action="">
        @csrf
        @method('DELETE')
        <h3 class="font-bold mb-5 text-lg">Are you sure to Delete?</h3>
        <input type="hidden" id="dataid" name="dataid">
        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded">Yes! Delete</button>
            <a class="bg-red-600 text-white px-3 py-1 rounded cursor-pointer" onclick="hidePopup()">Cancel</a>
        </div>
    </form>
</div>
{{-- End of Popup Modal --}}

    @endif
</div>

<script>
   function showPopup(a) {
    // Show the popup modal
    document.getElementById('popup').classList.remove('hidden');
    document.getElementById('popup').classList.add('flex');

    // Set the form action to the correct route
    document.getElementById('deleteForm').action = '/bookings/' + a;

    // Set the hidden input value to the booking ID
    document.getElementById('dataid').value = a;
}

function hidePopup() {
    // Hide the popup modal
    document.getElementById('popup').classList.remove('flex');
    document.getElementById('popup').classList.add('hidden');
}

</script>

@endsection
