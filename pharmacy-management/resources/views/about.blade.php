@extends('main')
@section('content')
<section class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">{{ $about->title }}</h2>
            <p class="mt-4 text-lg text-gray-600">{{ $about->subtitle }}</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <img src="{{ asset('storage/' . $about->image_path) }}" alt="Pharmacy" class="w-full h-64 object-cover rounded-lg shadow-lg">
            </div>
            <div class="flex flex-col justify-center">
                <p class="text-gray-700">{{ $about->content }}</p>
            </div>
        </div>
    </div>
</section>

@endsection