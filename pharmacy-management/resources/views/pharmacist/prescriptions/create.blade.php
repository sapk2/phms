@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Add Prescription</h1>
    <hr class="border-b-2 border-gray-300 mb-4">
    
    <form action="{{ route('pharmacist.prescriptions.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="patient_id" class="block text-sm font-medium text-gray-700">Select Patient</label>
            <select name="patient_id" id="patient_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">-- Select Patient --</option>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
            @error('patient_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700">Select Pharmacist</label>
            <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">-- Select Pharmacist --</option>
                @foreach($pharmacists as $pharmacist)
                    <option value="{{ $pharmacist->id }}">{{ $pharmacist->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="doctor_name" class="block text-sm font-medium text-gray-700">Doctor Name</label>
            <input type="text" name="doctor_name" id="doctor_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            @error('doctor_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create Prescription</button>
        <a href="{{ route('pharmacist.prescriptions.index') }}" class="bg-gray-300 text-gray-800 py-2 px-4 rounded hover:bg-gray-400 ml-2">Cancel</a>
    </form>
</div>
@endsection
