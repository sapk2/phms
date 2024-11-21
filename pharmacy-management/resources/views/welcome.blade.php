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
                <img src="{{ asset('/img/' . $medicine->photopath) }}" alt="{{ $medicine->name }}" class="w-51 h-51 object-cover">
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
<section class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            @if($about)
                <h2 class="text-3xl font-bold text-gray-900">{{ $about->title }}</h2>
                <p class="mt-4 text-lg text-gray-600">{{ $about->subtitle }}</p>
            @endif
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                @if($about && $about->image_path)
                    <img src="{{ asset('storage/' . $about->image_path) }}" alt="Pharmacy" class="w-full h-64 object-cover rounded-lg shadow-lg">
                @endif
            </div>
            <div class="flex flex-col justify-center">
                @if($about)
                    <p class="text-gray-700">{{ $about->content }}</p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h3 class="text-3xl font-bold text-gray-900">Meet Our Team</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="{{asset('img/list1.jpg')}}" alt="Team Member" class="w-24 h-24 mx-auto rounded-full mb-4">
                <h4 class="text-lg font-bold text-gray-900">Dr. John Doe</h4>
                <p class="text-gray-600">Pharmacist-in-Charge</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="{{asset('img/2055051.png')}}" alt="Team Member" class="w-24 h-24 mx-auto rounded-full mb-4">
                <h4 class="text-lg font-bold text-gray-900">Sarah Smith</h4>
                <p class="text-gray-600">Pharmacist</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <img src="{{asset('img/4747762.png')}}" alt="Team Member" class="w-24 h-24 mx-auto rounded-full mb-4">
                <h4 class="text-lg font-bold text-gray-900">Michael Johnson</h4>
                <p class="text-gray-600">Pharmacy Technician</p>
            </div>
        </div>
    </div>
</section>

@endsection
