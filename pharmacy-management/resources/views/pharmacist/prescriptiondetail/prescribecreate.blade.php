@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-3">
<h1 class="text-3xl font-bold mb-2">Create </h1>
<hr class="border-t-4 border-gray">
<form action="{{route('pharmacist.prescriptiondetail.prescribestore')}}" method="post" class="space-4">
@csrf
<!--prescriptiondetail-->
<div class="flex flex-col">
    <label for="prescription_id" class="font-bold mb-2">Prescription BY</label>
    <select name="prescription_id" id="prescription_id" class="form-control  border rounded-md border-gray-300" required>
    @foreach($prescriptiondetail as $prescription)
        <option value="{{$prescription -> id}}">{{$prescription->doctor_name}}</option>
        @endforeach
    </select>
</div>
<!--medicine-->
<div class="flex flex-col">
    <label for="medication_id" class="font-bold mb-2 px-2 mt-2">Medication</label>
    <select name="medication_id" id="medication_id" class="mb-2 font-medium  border rounded-md border-gray-300">
        @foreach($medication as $medications)
        <option value="{{$medications -> id}}">{{$medications->name}}</option>
        @endforeach
    </select>
</div>
<!-- Dosage -->
<div class="form-group">
            <label for="dosage" class="font-medium mb-1">Dosage</label>
            <input type="text" name="dosage" id="dosage" class="w-full mb-2 border rounded-md border-gray-300" required>
        </div>
             <!-- Quantity -->
             <div class="form-group">
            <label for="quantity" class="font-medium mb-1">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control w-full mb-2 border rounded-md border-gray-300" required>
        </div>
<!-- Submit Button -->
<div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Submit</button>
            <a href="{{route('pharmacist.prescriptiondetail.prescribeindex')}}" class="bg-gray-500 text-white py-3 px-7 rounded-lg">Cancel</a>
        </div>
</form>
</div>

@endsection
