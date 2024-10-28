@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Orders</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full divide-y divide-gray-200 bg-white shadow-md">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Patient</th>
                <th class="px-4 py-2 text-left">medicine</th>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Payment Method</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr class="hover:bg-gray-100">
                    <td class="border px-4 py-2">{{ $order->id }}</td>
                    <td class="border px-4 py-2">{{ $order->patient->name }}</td>
                    <td class="border px-4 py-2">{{ $order->medication->name }}</td>
                    <td class="border px-4 py-2">{{ $order->name }}</td>
                    <td class="border px-4 py-2">{{ $order->status }}</td>
                    <td class="border px-4 py-2">{{ $order->payment_method }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('orders.status', ['id' => $order->id, 'status' => 'Completed']) }}" class="bg-green-500 text-white p-2 rounded-md hover:bg-green-600 transition">Complete</a>
                        <a href="{{ route('orders.status', ['id' => $order->id, 'status' => 'Cancelled']) }}" class="bg-red-500 text-white p-2 rounded-md hover:bg-red-600 transition">Cancel</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection