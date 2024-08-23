@extends('layouts.app')
@section('content')
<h2 class="font-bold text-3xl text-gray-600">CREATE </h2>
<hr class="h-1 bg-blue-500">
<div class="mt-3">
    <form action="{{route('pharmacist.medicinemngt.medstore')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Medicine Name</label>
            <input type="text" name="name" id="name" class="bg-white border @error('name') border-red-500 text-red-500 @else border-gray-300 text-gray-900 @enderror text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="hero">
            @error('name')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea name="description" id="description" class="w-full bg-white border @error('name') border-red-500 text-red-500 @else border-gray-300 text-gray-900 @enderror text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></textarea>
        </div>
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 font-blod mb-4">Quantity</label>
            <input type="number" name="qunatity" id="quantity" class="w-full bg-white border @error('quantity') border-red-500 text-red-500 @else border-gray-300 text-gray-900 @enderror text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2.5">
        </div>
        <div class="mb-4">
            <label for="Price" class="block text-gray-700 font-blod mb-2">Price</label>
            <input type="number" name="price" id="price" class="w-full bgwhite border @error('price') border-red-500 text-red-500 @else border-gray-300 text-gray-900 @enderror text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2,5">
        </div>
        <div class="mb-4">
            <label for="medicine_type" class="block text-gray-700 font-blod mb-2">Medicine type</label>
            <input type="text" name="medicine_type" id="medicine_type" class="w-full bg-white border @error('medicine_type') border-red-500 text-red-500 @else border-gray-300 text-gray-900 @enderror text-sm rounded-md focus:border-blue-500 block p-2.5 ">

        </div>
        <div class="mb-4">
            <label for="photo" class="block text-gray-700 font-blod mb-2">Photo</label>
            <input type="file" name="photopath" id="photopath" class="form-control-file" required>
        </div>
        <div class="flex justify-center gap-5">
            <button class="bg-blue-600 text-white py-3 px-10 rounded-lg">Save</button>
            <a href="{{route('pharmacist.medicinemngt.medindex')}}" class="bg-red-500 text-white py-3 px-7 rounded-lg">Cancel</a>
        </div>
    </form>
</div>




@endsection