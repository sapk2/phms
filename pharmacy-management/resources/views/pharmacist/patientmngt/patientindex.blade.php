@extends('layouts.app')

@section('content')
<h1 class="font-bold text-3xl mt-2 text-gray-600">Patient Management</h1>
<hr class="h-1 bg-blue-600">
<div class="mt-10 text-right"> 
    <a href="{{route('pharmacist.patientmngt.patientcreate')}}" class="bg-blue-600 text-white p-3 rounded-lg">Add Patient</a>
</div>
<div class="container ">
    <!-- Search form -->
    <form action="{{ route('pharmacist.patientmngt.patientindex') }}" method="GET">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search patients..." value="{{ request()->search }}">
        </div>
        <button type="submit"  class="py-2.5 px-5 me-2 mt-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Search</button>
    </form>

    <!-- Patient table -->
    <table class="table table-striped mt-4 w-full border">
        <thead>
            <tr class="bg-red-300">
            <th class="border p-3">SN</th>
                <th class="border p-3">Name</th>
                <th class="border p-3">Email</th>
                <th class="border p-3">Phone</th>
                <th class="border p-3">Address</th>
                <th class="border p-3">Date of Birth</th>
                <th class="border p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($patients->count())
            @foreach($patients as $patient)
            <tr class="text-center">
            <td class="border p-3">{{$loop->index + 1 }}</td>
                <td class="border p-3">{{ $patient->name }}</td>
                <td class="border p-3">{{ $patient->email }}</td>
                <td class="border p-3">{{ $patient->phone }}</td>
                <td class="border p-3">{{ $patient->address }}</td>
                <td class="border p-3">{{ $patient->date_of_birth }}</td>
                <td>
                    <a href="{{ route('pharmacist.patientmngt.patientedit', $patient->id) }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-3">Edit</a>
                    <form action="{{ route('pharmacist.patientmngt.patientdelete', $patient->id) }}" method="get" style="display:inline;">
                        @csrf
                       
                        <button type="submit" class=" mt-4 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6">No patients found</td>
            </tr>
            @endif
        </tbody>
    </table>

    <!-- Pagination links -->
    <div class="d-flex justify-content-center">
        {{ $patients->appends(['search' => request()->search])->links() }}
    </div>
</div>
@endsection