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


@endsection
