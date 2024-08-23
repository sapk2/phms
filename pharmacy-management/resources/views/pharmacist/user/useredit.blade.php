@extends('layouts.app')

@section('content')
<div class="p-4 sm:ml-45">
    <div class="p-4 border-2 border-gray-200 mt-14">
        <h2 class="font-bold text-3xl text-blue-500">Edit Users</h2>
        <hr class="h-1 bg-blue-500">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="mt-10">
            <form action="{{ route('pharmacist.user.userupdate', $user->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray">Your Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray" 
                        required />
                </div>

                <div class="mb-3">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray">Your Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray" 
                        required />
                </div>

                <div class="mb-3">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="role" value="admin" {{ $user->role === 'admin' ? 'checked' : '' }} class="form-radio">
                            <span class="ml-2">Pharmacist</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="role" value="user" {{ $user->role === 'user' ? 'checked' : '' }} class="form-radio">
                            <span class="ml-2">User</span>
                        </label>
                    </div>
                </div>

                <div class="flex justify-center mt-6">
                    <input class="bg-blue-600 text-white px-4 py-2 rounded mx-2 cursor-pointer hover:bg-blue-700 transition" type="submit" value="Update">
                    <a href="{{ route('pharmacist.user.userindex') }}" class="bg-red-500 text-white px-4 py-2 rounded mx-2 hover:bg-red-600 transition">Exit</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
