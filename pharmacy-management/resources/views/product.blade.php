@extends('main')
@section('content')
<div class="container mx-auto my-5 bg-gradient-to-r from-blue-400 via-green-300 to-teal-400 p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4 text-white text-center">Our Medicines</h1>

    <!-- Search and Filter Container -->
    <div class="mb-5 flex items-center justify-between">
        <!-- Search Bar -->
        <form method="GET" action="{{ route('products') }}" class="flex w-full md:w-auto">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search for medicines..." 
                class="w-full md:w-64 p-2 border border-gray-300 rounded"
            />
            <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded">
                Search
            </button>
        </form>

        <!-- Filter Dropdown -->
        <div class="relative">
            <select 
                onchange="window.location.href=this.value" 
                class="w-full md:w-auto p-2 border border-gray-300 rounded cursor-pointer bg-white"
            >
                <option value="{{ route('products') }}">Medicines</option>
                @foreach ($medicineNames as $medicineName)
                    <option value="{{ route('products', ['category' => $medicineName]) }}"
                        {{ request('category') === $medicineName ? 'selected' : '' }}>
                        {{ $medicineName }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($medicines as $medicine)
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img 
                        class="p-8 rounded-t-lg" 
                        src="{{ asset('/storage/medicine/' . $medicine->photopath) }}" 
                        alt="{{ $medicine->name }}" 
                    />
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900">
                            {{ $medicine->name }}
                        </h5>
                    </a>
                    <p class="text-gray-600 mt-2 text-sm">
                        {{ $medicine->description }}
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900">
                            RS.{{ $medicine->price }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No medicines found.</p>
        @endforelse
    </div>
</div>
@endsection
