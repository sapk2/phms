@extends('layouts.app')

@section('content')
<div class="container mt-2 w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-200 dark:border-gray-200">
<h2 class="text-xl font-semibold mb-4">Edit Settings</h2>
<hr class="border border-red-200">
@if(session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('pharmacist.settings.siteupdate') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Application Name</label>
                <input type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ old('name', $settings->name) }}" />
            </div>

            <div class="mb-4">
                <label for="tagline" class="block text-sm font-medium text-gray-700">Tagline</label>
                <input type="text" name="tagline" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ old('tagline', $settings->tagline) }}" />
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">{{ old('description', $settings->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="keywords" class="block text-sm font-medium text-gray-700">Keywords</label>
                <input type="text" name="keywords" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ old('keywords', $settings->keywords) }}" />
            </div>

            <div class="mb-4">
                <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                <input type="file" name="logo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ old('logo', $settings->logo) }}" />
            </div>

            <div class="mb-4">
                <label for="favicon" class="block text-sm font-medium text-gray-700">Favicon</label>
                <input type="text" name="favicon" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ old('favicon', $settings->favicon) }}" />
            </div>

            <div class="mb-4">
                <label for="admin_email" class=" text-sm font-medium text-gray-700">Admin Email</label>
                <input type="email" name="admin_email" class="mt-1 block w-50 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ old('admin_email', $settings->admin_email) }}" required />
            </div>

            <button type="submit" class="w-62 bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Save Changes
            </button>
        </form>
    </div>

</div>
@endsection
