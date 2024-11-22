@extends('layouts.app')
@section('content')
<h1 class="font-bold text-3xl mt-3">Medications </h1>
<hr class=" h-1 bg-blue-500">
<div class="mt-10 text-right">
    <a href="{{route('pharmacist.medicinemngt.medcreate')}}" class="bg-blue-600 text-white p-3 rounded-lg">Add New</a>
</div>
<div class="container mt-6 ">
    <!-- Search form -->
    <form action="{{ route('pharmacist.medicinemngt.medindex') }}" method="GET">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search medicines..." value="{{ request()->search }}">
        </div>
        <button type="submit" class="py-2.5 px-5 me-2 mt-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Search</button>
    </form>
    <div class="overflow-x-auto">
        <table class="table-auto w-full mt-3 border=collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-3 text-left">SN</th>
                    <th class="border border-gray-300 p-3 text-left">Name</th>
                    <th class="border border-gray-300 p-3 text-left">image</th>
                    <th class="border border-gray-300 p-3 text-left">Description</th>
                    <th class="border border-gray-300 p-3 text-left">total_value</th>
                    <th class="border border-gray-300 p-3 text-left">Price</th>
                    <th class="border border-gray-300 p-3 text-left">Medicine Type</th>
                    <th class="border border-gray-300 p-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medicine as $item)
                <tr>
                    <td class="border border-gray-300 p-2">{{$item->id}}</td>
                    <td class="border border-gray-300 p-2">{{$item->name}}</td>
                    <td class="border border-gray-300 p-2"> <img src="{{ asset('/storage/medicine/' . $item->photopath) }}" alt="" class="w-16 h-16 object-cover"> <!-- Displaying image --></td>
                    <td class="border border-gray-300 p-2">{{$item->description}}</td>
                    <td class="border border-gray-300 p-2">{{$item->total_value}}</td>
                    <td class="border border-gray-300 p-2">RS{{$item->price}}per pecies</td>
                    <td class="border border-gray-300 p-2">{{$item->medicine_types}}</td>
                    <td class="border border-gray-300 p-3">
                        <a href="{{route('pharmacist.medicinemngt.mededit',$item->id)}}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</a>
                        <a href="{{route('pharmacist.medicinemngt.meddelete',$item->id)}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="return confirm('Are you sure to Delete?')">Delete</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{$medicine->links()}}
    </div>
</div>
@endsection