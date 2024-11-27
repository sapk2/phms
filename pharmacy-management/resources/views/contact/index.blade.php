@extends('main')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Contact Us</h1>

    @if (session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-medium">Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
            @error('name')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
            @error('email')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="subject" class="block font-medium">Subject</label>
            <input type="text" name="subject" id="subject" class="w-full p-2 border rounded" required>
            @error('subject')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="message" class="block font-medium">Message</label>
            <textarea name="message" id="message" class="w-full p-2 border rounded" rows="5" required></textarea>
            @error('message')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Send Message</button>
        </div>
    </form>
</div>
@endsection