@extends('main')
@section('content')


<!-- Contact Us Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">Contact Us</h2>

        <!-- Success Message -->
        @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block font-medium">Name</label>
                    <input type="text" name="name" id="name" class="w-full p-3 border rounded" required>
                    @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block font-medium">Email</label>
                    <input type="email" name="email" id="email" class="w-full p-3 border rounded" required>
                    @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Subject Field -->
            <div class="mb-4">
                <label for="subject" class="block font-medium">Subject</label>
                <input type="text" name="subject" id="subject" class="w-full p-3 border rounded" required>
                @error('subject')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Message Field -->
            <div class="mb-4">
                <label for="message" class="block font-medium">Message</label>
                <textarea name="message" id="message" class="w-full p-3 border rounded" rows="5" required></textarea>
                @error('message')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Send Message</button>
            </div>
        </form>
    </div>
</section>
@endsection