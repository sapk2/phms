@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-2xl font-bold mb-4">Low Stock Items</h2>
        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 py-2">Medication Name</th>
                    <th class="px-4 py-2">Total Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lowStockItems as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $item->medication->name }}</td>
                        <td class="border px-4 py-2">{{ $item->total_quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if(count($lowStockItems) == 0)
            <p class="mt-4">No low stock items found.</p>
        @endif

        <a href="{{ route('pharmacist.inventory.index') }}" class="btn btn-primary mt-4">Back to Inventory</a>
    </div>
@endsection
