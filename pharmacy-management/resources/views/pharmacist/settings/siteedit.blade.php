@extends('layouts.app')

@section('content')
<div class="container mt-2 w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-200 dark:border-gray-200">
    <h2 class="text-xl font-semibold mb-4">Edit Settings</h2>
    <hr class="border border-red-200">
    
    @if(session('success'))
        <div id="success-message" class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('pharmacist.settings.siteupdate') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Application Name</label>
            <input type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('name') border-red-500 @enderror" value="{{ old('name', $settings->name) }}" />
            @error('name')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tagline" class="block text-sm font-medium text-gray-700">Tagline</label>
            <input type="text" name="tagline" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('tagline') border-red-500 @enderror" value="{{ old('tagline', $settings->tagline) }}" />
            @error('tagline')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('description') border-red-500 @enderror">{{ old('description', $settings->description) }}</textarea>
            @error('description')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="keywords" class="block text-sm font-medium text-gray-700">Keywords</label>
            <input type="text" name="keywords" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('keywords') border-red-500 @enderror" value="{{ old('keywords', $settings->keywords) }}" />
            @error('keywords')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
            <input type="file" name="logo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('logo') border-red-500 @enderror" />
            @error('logo')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
            @if($settings->logo)
                <img src="{{ asset('storage/' . $settings->logo) }}" alt="Current Logo" class="mt-2 w-20 h-20 object-cover" />
            @endif
        </div>

        <div class="mb-4">
            <label for="favicon" class="block text-sm font-medium text-gray-700">Favicon</label>
            <input type="text" name="favicon" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('favicon') border-red-500 @enderror" value="{{ old('favicon', $settings->favicon) }}" />
            @error('favicon')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="admin_email" class="text-sm font-medium text-gray-700">Admin Email</label>
            <input type="email" name="admin_email" class="mt-1 block w-50 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 @error('admin_email') border-red-500 @enderror" value="{{ old('admin_email', $settings->admin_email) }}" required />
            @error('admin_email')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="w-62 bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
            Save Changes
        </button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var successMessage = "{{ session('success') }}"; // Get the success message from the session

        if (successMessage) {
            alert(successMessage); // Display it as a prompt
        }
    });
</script>
@endsection
