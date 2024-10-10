@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Inventory List</h1>
    
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('pharmacist.inventory.create') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md mr-2">Add Inventory</a>
        <a href="{{ route('pharmacist.inventory.lowStock') }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-md">Low Stock Items</a>
    </div>

    <form action="{{ route('pharmacist.inventory.search') }}" method="GET" class="my-3">
        <input type="text" name="query" placeholder="Search Inventory" required class="border border-gray-300 rounded-md py-2 px-3 mr-2">
        <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-md">Search</button>
    </form>

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="py-2 px-4 text-left text-gray-600">ID</th>
                <th class="py-2 px-4 text-left text-gray-600">Medication</th>
                <th class="py-2 px-4 text-left text-gray-600">Quantity</th>
                <th class="py-2 px-4 text-left text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventory as $item)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $item->id }}</td>
                    <td class="py-2 px-4">{{ $item->medication->name }}</td>
                    <td class="py-2 px-4">{{ $item->quantity }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('pharmacist.inventory.edit', $item->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-2 rounded-md">Edit</a>
                        <form action="{{ route('pharmacist.inventory.delete', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-2 rounded-md">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
