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

        <a href="{{ route('pharmacist.inventory.index') }}" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Back to Inventory</a>
    </div>
@endsection
