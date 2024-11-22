@extends('main')
@section('content')
<div class="container mx-auto my-5">
    <h1 class="text-2xl font-bold mb-2">Our Medicines</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($medicines as $medicine)
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <!-- Medicine Image -->
                    <img 
                        class="p-8 rounded-t-lg" 
                        src="{{ asset('/storage/medicine/' . $medicine->photopath) }}" 
                        alt="{{ $medicine->name }}" 
                    />
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <!-- Medicine Name -->
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ $medicine->name }}
                        </h5>
                    </a>
                    <!-- Medicine Description -->
                    <p class="text-gray-600 mt-2 text-sm">
                        {{ $medicine->description }}
                    </p>
                    
                    <div class="flex items-center justify-between">
                        <!-- Medicine Price -->
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">
                            RS.{{ $medicine->price }}
                        </span>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
