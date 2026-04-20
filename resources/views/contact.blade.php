@extends('layouts.master') <!-- Use your main layout -->

@section('content')
<div class="bg-gray-100 py-12">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-4xl font-bold text-center text-pink-600 mb-6">Contact Us</h1>
        <p class="text-center text-gray-700 mb-8">Have questions? Feel free to reach out to us!</p>

        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Your Name</label>
                <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none" required pattern="[A-Za-z\s]+" title="Name must contain only letters and spaces">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Your Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Message</label>
                <textarea name="message" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none" required></textarea>
            </div>

            <button type="submit" class="w-full bg-pink-600 text-white font-semibold py-2 rounded-lg hover:bg-pink-700 transition">Send Message</button>
        </form>
    </div>
</div>
@endsection
