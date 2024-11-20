@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Manage About Us</h1>

    <form action="{{ route('pharmacist.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium">Title</label>
            <input type="text" name="title" id="title" value="{{ $about->title ?? '' }}" class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label for="subtitle" class="block text-gray-700 font-medium">Subtitle</label>
            <input type="text" name="subtitle" id="subtitle" value="{{ $about->subtitle ?? '' }}" class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-medium">Content</label>
            <textarea name="content" id="content" rows="5" class="w-full border rounded p-2">{{ $about->content ?? '' }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-medium">Image</label>
            <input type="file" name="image" id="image" class="w-full">
            @if ($about && $about->image_path)
                <img src="{{ asset('storage/' . $about->image_path) }}" class="mt-4 w-40 rounded">
            @endif
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
    </form>
</div>
@endsection
