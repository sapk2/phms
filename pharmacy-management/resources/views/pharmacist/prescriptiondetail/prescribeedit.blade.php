@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-3">
    <h1 class="text-3xl font-bold mb-2">Edit Prescription</h1>
    <hr class="border-t-4 border-gray">
    
    <!-- Ensure the form points to the correct update route -->
    <form action="{{route('pharmacist.prescriptiondetail.prescribeupdate', $prescriptiondetail->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Prescription By -->
        <div class="flex flex-col">
            <label for="prescription_id" class="font-bold mb-2">Prescription By</label>
            <select name="prescription_id" id="prescription_id" class="form-control border rounded-md border-gray-300" required>
                @foreach($prescriptions as $prescription)
                    <option value="{{ $prescription->id }}" {{ $prescriptiondetail->prescription_id == $prescription->id ? 'selected' : '' }}>
                        {{ $prescription->doctor_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Medication -->
        <div class="flex flex-col">
            <label for="medication_id" class="font-bold mb-2 mt-2">Medication</label>
            <select name="medication_id" id="medication_id" class="form-control border rounded-md border-gray-300" required>
                @foreach($medications as $medication)
                    <option value="{{ $medication->id }}" {{ $prescriptiondetail->medication_id == $medication->id ? 'selected' : '' }}>
                        {{ $medication->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Dosage -->
        <div class="form-group mt-5">
            <label for="dosage" class="font-bold mb-2">Dosage</label>
            <input type="text" name="dosage" id="dosage" value="{{ $prescriptiondetail->dosage }}" class="form-control border rounded-md border-gray-300" required>
        </div>

        <!-- Quantity -->
        <div class="form-group mt-">
            <label for="quantity" class="font-bold mb-2">Quantity</label>
            <input type="number" name="quantity" id="quantity" value="{{ $prescriptiondetail->quantity }}" class="form-control border rounded-md border-gray-300" required>
        </div>

        <!-- Submit Button -->
        <div class="mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Update</button>
            <a href="{{route('pharmacist.prescriptiondetail.prescribeindex')}}" class="bg-gray-500 text-white py-3 px-7 rounded-lg">Cancel</a>
        </div>
    </form>
</div>
@endsection
