@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-3">
    <h1 class="text-2xl font-bold mb-6">Prescription Details</h1>
    <hr class="border-t-4 border-gray-400 mb-6">
    <div class="flex justify-end mb-4">
        <a href="{{ route('pharmacist.prescriptiondetail.prescribecreate') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Add details</a>
    </div>
    <div class="mt-8">
        
    <div class="mb-4">
    <form action="{{ route('pharmacist.prescriptiondetail.prescribeindex') }}" method="GET">
        <div class="flex items-center">
            <input type="text" name="search" placeholder="Search prescriptions..." 
                   class="border px-4 py-2 rounded-lg focus:ring focus:ring-blue-300 w-1/3" 
                   value="{{ request('search') }}">
            <button type="submit" class="ml-2 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Search
            </button>
        </div>
    </form>
</div>

        <table class="table-auto w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">SN</th>
                    <th class="border px-4 py-2">Prescribed By</th>
                    <th class="border px-4 py-2">Medicine</th>
                    <th class="border px-4 py-2">Dosage</th>
                    <th class="border px-4 py-2">Unit(tablet/syrup)</th>
                    <th class="border px-4 py-2">Created At</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prescriptiondetail as $prescription_detail)
                <tr> <!-- Add this tag to group each row's data -->
                    <td class="border px-4 py-2">{{$loop->index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $prescription_detail->prescription->doctor_name }}</td>
                    <td class="border px-4 py-2">{{ $prescription_detail->medication->name }}</td>
                    <td class="border px-4 py-2">{{ $prescription_detail->dosage }}</td>
                    <td class="border px-4 py-2">{{ $prescription_detail->quantity }}</td>
                    <td class="border px-4 py-2">{{ $prescription_detail->created_at->format('d-m-Y') }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('pharmacist.prescriptiondetail.prescribeedit', $prescription_detail->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                        <a href="{{ route('pharmacist.prescriptiondetail.show', $prescription_detail->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">View</a>
                        <a href="{{ route('pharmacist.prescriptiondetail.prescribedelete', $prescription_detail->id) }}" class="bg-red-600 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure to Delete?')">Delete</a>
                    </td>
                </tr> <!-- Close this tag after each row's data -->
                @endforeach
            </tbody>
        </table>
         <!-- Pagination Links -->
    <div class="mt-4">
        {{ $prescriptiondetail->appends(['search' => request('search')])->links() }}
    </div>
    </div>
</div>
@endsection
