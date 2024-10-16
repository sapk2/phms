@extends('layouts.app')
@section('content')
<div class="flex items-center justify-center mt-8">
    <div class="max-w-sm w-full p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-200 dark:border-gray-300">
        <h1 class="text-2xl font-bold text-center mb-4">Edit Item </h1>
        <hr class="border border-red-200 mb-4">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('pharmacist.inventory.update',$inventory->id)}}" method="post" enctype="multipart/form-data">
            @csrf
           
            <div class="mb-3">
                <label for="medication_id" class="form-label">Medication</label>
                <select name="medication_id" id="medication_id" class="form-control rounded border border-gray-100 w-full" required>
                    <option value="">Select Medication</option>
                    @foreach($medications as $med)
                        <option value="{{ $med->id }}" {{ $inventory->medication_id == $med->id ? 'selected' : '' }}>
                            {{ $med->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control rounded border border-gray-100 w-full" id="quantity" required min="1" value="{{ $inventory->quantity }}">
            </div>
            <div class="flex mt-4 justify-center gap-4">
                <input type="submit" value="Update" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition cursor-pointer">
                <a href="{{ route('pharmacist.inventory.index') }}" class="bg-red-400 text-white px-5 py-2 rounded hover:bg-red-700 transition">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection