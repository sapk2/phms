@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-3">
    <h1 class="text-3xl font-bold mb-4">Prescription Details</h1>
    <hr class="border-t-4 border-gray">
    <div class="mt-5">
        <h2 class="font-bold px-12 py-1">PharmacyName:{{config('app.name')}}</h2>
        <h2 class="font-bold">Doctor Name:{{ $prescriptiondetail -> prescription->doctor_name}}</h2>
        <h2 class="font-bold">patient Name:{{ $prescriptiondetail -> prescription->patient_name}}</h2>
        
    </div>
</div>
@endsection
