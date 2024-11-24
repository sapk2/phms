@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-3">
    <h1 class="text-3xl font-bold mb-4">Prescription Details</h1>
    <hr class="border-t-4 border-gray">
    <div class="mt-5">
        <h2 class="font-bold">PharmacyName: {{$settings->name}}</h2>
        <h2 class="font-bold">Date:{{ $prescriptiondetail ->created_at->format('d-m-Y')}}</h2>
        <h2 class="font-bold">Doctor Name:{{ $prescriptiondetail -> prescription->doctor_name}}</h2>
        <h2 class="font-bold">patient Name:{{ $prescriptiondetail -> prescription->patient->name}}</h2>
        
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-semi bold mb-4"> Medicine Prescription</h2>
        <hr class="bordermt-3">
        <table class="table-auto w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2 ">Medicine</th>
                    <th class="border px-4 py-2 ">Dosage</th>
                    <th class="border px-4 py-2 ">Unit</th>

                </tr>
            </thead>
            <tbody>
    <tr>
        <td class="border px-4 py-2">{{ $prescriptiondetail->medication->name }}</td>
        <td class="border px-4 py-2">{{ $prescriptiondetail->dosage }}</td>
        <td class="border px-4 py-2">{{ $prescriptiondetail->quantity ?? 'N/A' }}</td>
    </tr>
</tbody>



        </table>

    </div>
    <div class="mt-6">
        <a href="{{ route('pharmacist.prescriptiondetail.prescribeindex') }}" class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Back to List</a>
    </div>
</div>
@endsection
