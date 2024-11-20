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

<!-- Featured Products Section -->
<!-- Featured Products Section -->
<section class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">Featured Products</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($featuredProducts as $product)
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">{{ $product->name }}</h3>
                    <p class="text-gray-600 mt-2 text-sm">{{ $product->description }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                        <a href="#" class="text-white bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            View
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="#" class="text-blue-600 hover:underline font-medium">
                View All Products
            </a>
        </div>
    </div>
</section>


<!-- About Us Section -->
<section class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">About Us</h2>
            <p class="mt-4 text-lg text-gray-600">Your trusted partner in health and wellness.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <img src="{{asset('img/imagesq.jpg')}}" alt="Pharmacy" class="w-full h-64 object-cover rounded-lg shadow-lg">
            </div>
            <div class="flex flex-col justify-center">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Our Mission</h3>
                <p class="text-gray-700">We strive to provide exceptional pharmaceutical care and build lasting relationships with our customers.</p>
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
