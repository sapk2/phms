@extends('layouts.app')
@section('content')
<div class="container max-auto">
    <h1 class="text-2xl font-bold mt-4 px-2">Inventories</h1>
    <hr class="h-1 bg-blue-600">
    
    <div class="mt-10 text-right">
        <a href="{{route('pharmacist.inventory.create')}}" class="bg-blue-600 text-white p-3 rounded-lg">Add inventory</a>
        <a href="{{route('pharmacist.inventory.low_stock')}}"class="bg-yellow-500 text-white p-3 rouned-md">stock</a>

    </div>
    <table class="table table-striped mt-4 w-full border">
        <thead>
            <tr class="bg-gray-300">
                <th class="border p-3">SN</th>
                <th class="border p-3">Medication Name</th>
                <th class="border p-3">stock quantity</th>
                <th class="border p-3">Actions</th>

            </tr>
        </thead>
        <tbody>
        @foreach($inventory as $item)

            <tr class="text-center">
                <td class="border p-3">{{$item->id }}</td>
                <td class="border p-3">{{$item->medication->name}}</td>
                <td class="border p-3">{{$item->quantity}}</td>
                <td>
                    <a href="{{route('pharmacist.inventory.edit',$item->id)}}"class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-3">Edit</a>
                    <form action="{{ route('pharmacist.inventory.delete', $item->id) }}" method="get" style="display:inline;">
                        @csrf
                       
                        <button type="submit" class=" mt-4 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="return confirm('Are you sure to Delete!!!!!!!!!!!!!!!?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection