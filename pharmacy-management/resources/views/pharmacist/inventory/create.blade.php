@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Add Inventory</h1>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pharmacist.inventory.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="medication_id" class="block text-gray-700 font-semibold mb-2">Medication</label>
            <select name="medication_id" id="medication_id" class="border border-gray-300 rounded-md py-2 px-3 w-full">
                @foreach($medication as $med)
                    <option value="{{ $med->id }}">{{ $med->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 font-semibold mb-2">Quantity</label>
            <input type="number" name="quantity" class="border border-gray-300 rounded-md py-2 px-3 w-full" id="quantity" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Add Inventory</button>
        <a href="{{ route('pharmacist.inventory.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-md ml-2">Back to Inventory</a>
    </form>
</div>
@endsection
