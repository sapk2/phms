@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Sales</h1>
        <a href="{{ route('pharmacist.sales.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Sale</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded overflow-hidden">
    <div class="flex justify-between items-center mb-4">
    <form action="{{ route('pharmacist.sales.index') }}" method="GET" class="flex items-center">
        <input type="text" name="search" placeholder="Search by medication name..." 
               class="border px-4 py-2 rounded-lg focus:ring focus:ring-blue-300" 
               value="{{ request('search') }}">
        <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Search
        </button>
    </form>
  
</div>
    <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2">SN</th>
                    <th class="px-4 py-2">Medication</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Total Price</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{$loop->index + 1 }}</td>
                        <td class="px-4 py-2">{{ $sale->medication->name }}</td>
                        <td class="px-4 py-2">{{ $sale->quantity }}</td>
                        <td class="px-4 py-2">RS.{{ number_format($sale->total_price, 2) }}</td>
                        <td class="px-4 py-2">{{ $sale->sale_date }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('pharmacist.sales.show', $sale->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View</a>
                            <a href="{{ route('pharmacist.sales.edit', $sale->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('pharmacist.sales.destroy', $sale->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('Seriously!!')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
    {{ $sales->appends(['search' => request('search')])->links() }}
</div>
    </div>
</div>
@endsection