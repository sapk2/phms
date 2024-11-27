@extends('main')
@section('content')

<!-- Hero Section -->
<section class="bg-blue-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold">{{$settings->name}}</h1>
        <p class="mt-4 text-lg">{{$settings->description}}</p>
        <a href="{{route('pharmacist.dashboard')}}" class="mt-8 inline-block bg-white text-blue-600 px-6 py-2 font-semibold rounded shadow hover:bg-gray-100 transition">
            Get Started
        </a>
    </div>
</section>


<!-- Featured Medicines Section -->
<section class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">Our Medicines</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($medicines as $medicine)
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <!-- Display the image -->
                <img src="{{ asset('/storage/medicine/' . $medicine->photopath) }}" alt="{{ $medicine->name }}" class="w-51 h-51 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">{{ $medicine->name }}</h3>
                    <p class="text-gray-600 mt-2 text-sm">{{ $medicine->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



<!-- About Us Section -->
<section id="about" class="my-8">
    <div class="sm:flex items-center max-w-screen-xl mx-auto">
        <div class="sm:w-1/2 p-10">
            <div class="image object-center text-center">
                @if ($about && $about->image_path)
                    <img src="{{ asset('storage/' . $about->image_path) }}" alt="About Us Image" class="rounded shadow">
                @else
                    <img src="https://i.imgur.com/WbQnbas.png" alt="Default Image">
                @endif
            </div>
        </div>
        <div class="sm:w-1/2 p-5">
            <div class="text">
                <span class="text-gray-500 border-b-2 border-indigo-600 uppercase">About Us</span>
                <h2 class="my-4 font-bold text-3xl sm:text-4xl">
                    {{ $about->title ?? 'About Our Company' }}
                </h2>
                <h3 class="text-indigo-600 text-xl my-2">
                    {{ $about->subtitle ?? 'Your Trusted Pharmacy Partner' }}
                </h3>
                <p class="text-gray-700">
                    {{ $about->content ?? 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, commodi doloremque, fugiat illum magni minus nisi nulla numquam obcaecati placeat quia, repellat tempore voluptatum.' }}
                </p>
            </div>
        </div>
    </div>
</section>



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
