@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Checkout</h1>
    
    @if (session('error'))
        <div class="bg-red-500 text-white p-3 rounded mb-4">{{ session('error') }}</div>
    @endif

    <form action="{{ route('orders.confirm') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <h2 class="text-xl font-semibold mb-4">Your Cart Items</h2>
        <table class="min-w-full divide-y divide-gray-200 mb-4">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Medication</th>
                    <th class="px-4 py-2 text-left">Price</th>
                    <th class="px-4 py-2 text-left">Quantity</th>
                    <th class="px-4 py-2 text-left">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $cartItem)
                    @php
                        $price = $cartItem->medicine->discounted_price ?? $cartItem->medicine->price;
                        $total = $price * $cartItem->qty;
                    @endphp
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2">{{ $cartItem->medicine->name }}</td>
                        <td class="border px-4 py-2">${{ number_format($price, 2) }}</td>
                        <td class="border px-4 py-2">{{ $cartItem->qty }}</td>
                        <td class="border px-4 py-2">${{ number_format($total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3 class="text-lg font-bold mb-4">Total Price: ${{ number_format($totalPrice, 2) }}</h3>

        <h2 class="text-xl font-semibold mb-4">Shipping Details</h2>
        <div class="mb-4">
            <label for="patient_id" class="block text-sm font-medium text-gray-700">Patient ID</label>
            <input type="text" name="patient_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <textarea name="address" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required></textarea>
        </div>
        <div class="mb-4">
            <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
            <select name="payment_method" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                <option value="credit_card">Credit Card</option>
                <option value="cash">Cash</option>
                <option value="ots">Khalti</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition">Confirm Order</button>
    </form>
</div>
@endsection