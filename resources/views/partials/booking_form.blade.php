{{-- <form id="bookingForm" action="{{ route('submit.booking',$package->id) }}" method="POST" class="max-w-lg mx-auto p-6 bg-gradient-to-r from-fuchsia-500 to-pink-500 rounded-lg shadow-md">
    @csrf
    <div class="grid gap-6">
        <!-- Name -->
        <div class="form-group">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Your Name</label>
            <input
                type="text" id="name" name="name"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200"
                required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input
                type="email" id="email" name="email"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200"
                required>
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone</label>
            <input
                type="text" id="phone" name="phone"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200"
                required>
        </div>

        <!-- Skin Type -->
        <div class="form-group">
            <label for="skin_type" class="block text-gray-700 font-semibold mb-2">Skin Type</label>
            <select
                id="skin_type" name="skin_type"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200"
                required>
                <option value="">Select Your Skin Type</option>
                <option value="Normal">Normal</option>
                <option value="Oily">Oily</option>
                <option value="Dry">Dry</option>
                <option value="Combination">Combination</option>
                <option value="Sensitive">Sensitive</option>
            </select>
        </div>

        <!-- Booking Date -->
        <div class="form-group">
            <label for="booking_date" class="block text-gray-700 font-semibold mb-2">Booking Date</label>
            <input
                type="date" id="booking_date" name="booking_date"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200"
                required>
        </div>

        <!-- Booking Time -->
        <div class="form-group">
            <label for="booking_time" class="block text-gray-700 font-semibold mb-2">Booking Time</label>
            <input
                type="time" id="booking_time" name="booking_time"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200"
                required>
        </div>

        <!-- Comments -->
        <div class="form-group">
            <label for="comments" class="block text-gray-700 font-semibold mb-2">Comments (Optional)</label>
            <textarea
                id="comments" name="comments"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <button
                type="submit"
                class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-3 rounded-lg shadow hover:shadow-lg transition duration-200">
                Submit Booking
            </button>
        </div>
    </div>
</form> --}}
