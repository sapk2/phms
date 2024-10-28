
@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-6">My Cart</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if ($carts->isEmpty())
            <p class="text-gray-700">Your cart is currently empty.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 text-sm uppercase">
                            <th class="py-3 px-4 text-left">Product</th>
                            <th class="py-3 px-4 text-left">Quantity</th>
                            <th class="py-3 px-4 text-left">Price</th>
                            <th class="py-3 px-4 text-left">Total</th>
                            <th class="py-3 px-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            <tr class="border-t">
                                <td class="py-4 px-4">{{ $cart->product->name }}</td>
                                <td class="py-4 px-4">{{ $cart->qty }}</td>
                                <td class="py-4 px-4">
                                    {{ $cart->product->discounted_price ? $cart->product->discounted_price : $cart->product->price }}
                                </td>
                                <td class="py-4 px-4">
                                    {{ $cart->total }}
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <form action="{{ route('cart.destroy', $cart->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
