@extends('layouts.app')
@section('content')
<h2 class="font-bold text-3xl text-gray-600">EDIT MEDICINE</h2>
<hr class="h-1 bg-blue-500">
<div class="mt-3">
    <form action="{{ route('pharmacist.medicinemngt.medupdate', $medicine->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Medicine Name</label>
            <input type="text" name="name" id="name" value="{{ $medicine->name }}" class="bg-white border @error('name') border-red-500 text-red-500 @else border-gray-300 text-gray-900 @enderror text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Medicine Name">
            @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea name="description" id="description" class="w-full bg-white border @error('description') border-red-500 text-red-500 @else border-gray-300 text-gray-900 @enderror text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>{{ $medicine->description }}</textarea>
            @error('description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="total_value" class="block text-gray-700 font-bold mb-2">total_value</label>
            <input type="number" name="total_value" id="total_value" value="{{ $medicine->total_value }}" class="w-full bg-white border @error('total_value') border-red-500 text-red-500 @else border-gray-300 text-gray-900 @enderror text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2.5">
            @error('total_value')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Price</label>
            <input type="number" name="price" id="price" value="{{ $medicine->price }}" class="w-full bg-white border @error('price') border-red-500 text-red-500 @else border-gray-300 text-gray-900 @enderror text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2.5">
            @error('price')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="medicine_type" class="block text-gray-700 font-bold mb-2">Medicine Type</label>
            <input type="text" name="medicine_types" id="medicine_type" value="{{ $medicine->medicine_types }}" class="w-full bg-white border @error('medicine_types') border-red-500 text-red-500 @else border-gray-300 text-gray-900 @enderror text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2.5">
            @error('medicine_types')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="photopath" class="block text-gray-700 font-bold mb-2">Photo</label>
            <input type="file" name="photopath" id="photopath" class="form-control-file">
            @if($medicine->photopath)
    <img src="{{ asset('img/' . $medicine->photopath) }}" alt="Medicine Photo" class="w-16 h-16 mt-2">
@endif

            @error('photopath')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-center gap-5">
            <button class="bg-blue-600 text-white py-3 px-10 rounded-lg">Update</button>
            <a href="{{ route('pharmacist.medicinemngt.medindex') }}" class="bg-red-500 text-white py-3 px-7 rounded-lg">Cancel</a>
        </div>
    </form>
</div>
@endsection
