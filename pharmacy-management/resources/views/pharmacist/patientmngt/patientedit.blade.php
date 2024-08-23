@extends('layouts.app')
@section('content')
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-blod mb-5">Edit </h1>
    <hr class="h-1 bg-blue-500">
    <form action="{{route('pharmacist.patientmngt.patientupdate',$patient->id)}}" method="post"class="max-w-md mx-auto">
        @csrf
         <!-- Name Field -->
         <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="bg-white border @error('name') border-red-500 text-red-500 @else border-gray-300 text-gray-900 @enderror text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('name', $patient->name) }}">
            @error('name')
            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{ $message }}</p>
            @enderror
        </div>

        <!-- Date of Birth Field -->
        <div class="mb-5">
            <label for="dob" class="block mb-2 text-sm font-medium text-gray-700">DOB</label>
            <input type="date" name="date_of_birth" id="dob" class="bg-white border @error('date_of_birth') border-red-500 text-red-900 @else border-gray-300 text-gray-900 @enderror text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('date_of_birth', $patient->date_of_birth) }}">
            @error('date_of_birth')
            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{ $message }}</p>
            @enderror
        </div>

        <!-- Address Field -->
        <div class="mb-5">
            <label for="address" class="block mb-2 text-sm font-medium text-gray-700">Address</label>
            <input type="text" id="address" name="address" class="bg-white border @error('address') border-red-500 text-red-900 @else border-gray-300 text-gray-900 @enderror text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('address', $patient->address) }}">
            @error('address')
            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{ $message }}</p>
            @enderror
        </div>

        <!-- Phone Field -->
        <div class="mb-5">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-700">Phone</label>
            <input type="text" id="phone" name="phone" class="bg-white border @error('phone') border-red-500 text-red-900 @else border-gray-300 text-gray-900 @enderror text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('phone', $patient->phone) }}">
            @error('phone')
            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{ $message }}</p>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="bg-white border @error('email') border-red-500 text-red-900 @else border-gray-300 text-gray-900 @enderror text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('email', $patient->email) }}">
            @error('email')
            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> {{ $message }}</p>
            @enderror
        </div>

        <!-- Update & Cancel Buttons -->
        <div class="flex justify-center gap-5">
            <button type="submit" class="bg-blue-600 text-white py-3 px-10 rounded-lg">Update</button>
            <a href="{{ route('pharmacist.patientmngt.patientindex') }}" class="bg-red-500 text-white py-3 px-7 rounded-lg">Cancel</a>
        </div>
    </form>
</div>
@endsection