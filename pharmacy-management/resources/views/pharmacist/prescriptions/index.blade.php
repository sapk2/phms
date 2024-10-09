@extends('layouts.app')
@section('content')
<h1 class="mt-5 text-3xl font-bold py-2 px-4">Prescription Manangement</h1>
<hr class="bg-gray-700">
<div class="container mt-2 px-4 py-8">
    <div class="flex justify-end mb-4">
        <a href="{{route('pharmacist.prescriptions.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ">Add prescription</a>
    </div>
     <div class="mt-8">
        <table class="table-auto w-full text-left border-collapase">
            <thead>
                <tr class="bg-red-200">
                    <th class="border px-4 py-2">SN</th>
                    <th class="border px-4 py-2">patient Name</th>
                    <th class="border px-4 py-2">Pharmacist Name </th>
                    <th class="border px-4 py-2">Prescribed by</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (  $prescriptions as $prescription)
                <tr class="bg-gray-100 hover:bg-gray-300">
                    <td class="border px-4 py-2">{{$prescription->id}}</td>
                    <td class="border px-4 py-2">{{$prescription->patient->name}}</td>
                    <td class="border px-4 py-2">{{$prescription->user->name}}</td>
                    <td class="border px-4 py-2">{{$prescription->doctor_name}}</td>
                    <td class="border px-4 py-2">
                        <a href="{{route('pharmacist.prescriptions.edit',$prescription->id)}}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('pharmacist.prescriptions.delete', $prescription->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>






                </tr>
                
                @endforeach
            </tbody>
        </table>
     </div>
</div>
@endsection