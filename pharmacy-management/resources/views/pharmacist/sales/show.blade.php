@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Sale Details</h1>

    <div class="bg-white shadow-md rounded p-4">
        <p><strong>Medication:</strong> {{ $sale->medication->name }}</p>
        <p><strong>Quantity:</strong> {{ $sale->quantity }}</p>
        <p><strong>Total Price:</strong> RS.{{ number_format($sale->total_price, 2) }}</p>
        <p><strong>Date of Sale:</strong> {{ $sale->sale_date}}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('pharmacist.sales.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back to Sales</a>
    </div>
</div>
@endsection