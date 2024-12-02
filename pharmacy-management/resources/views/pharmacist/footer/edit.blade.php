@extends('layouts.app')
@section('content')
<div class="container mx-auto mt-4">
<h1 class="text-2xl font-bold mb-4">Edit Footer</h1>
<hr class="border-gray-900">


    <form action="{{ route('pharmacist.footer.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex flex-wrap lg:flex-nowrap gap-6">
            <!-- First Column: Description and Contact Information -->
            <div class="w-full lg:w-1/2 bg-blue-100 p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-bold mb-4">Description and Contact Information</h2>
                <hr class="border-red-300">

                <div class="mb-4">
                    <label for="description" class="block font-medium">Description</label>
                    <textarea name="description" id="description" class="w-full p-2 border rounded">{{ $footer->description ?? '' }}</textarea>
                    @error('description')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address" class="block font-medium">Address</label>
                    <input type="text" name="address" id="address" class="w-full p-2 border rounded" value="{{ $footer->address ?? '' }}">
                    @error('address')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block font-medium">Email</label> 
                    <input type="email" name="email" id="email" class="w-full p-2 border rounded" value="{{ $footer->email  ?? ''}}">
                    @error('email')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="block font-medium">Phone</label>
                    <input type="text" name="phone" id="phone" class="w-full p-2 border rounded" value="{{ $footer->phone ?? '' }}">
                    @error('phone')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="emergency_phone" class="block font-medium">Emergency Phone</label>
                    <input type="text" name="emergency_phone" id="emergency_phone" class="w-full p-2 border rounded" value="{{ $footer->emergency_phone ?? '' }}">
                </div>
            </div>

            <!-- Second Column: Social Media URLs and Copyright -->
            <div class="w-full lg:w-1/2 bg-blue-100 p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-bold mb-4 ">Social Media and Copyright</h2>
                <hr class="border-red-300">

                <div class="mb-4">
                    <label for="facebook_url" class="block font-medium">Facebook URL</label>
                    <input type="text" name="facebook_url" id="facebook_url" class="w-full p-2 border rounded" value="{{ $footer->facebook_url ?? ''}}">
                </div>

                <div class="mb-4">
                    <label for="twitter_url" class="block font-medium">Twitter URL</label>
                    <input type="text" name="twitter_url" id="twitter_url" class="w-full p-2 border rounded" value="{{ $footer->twitter_url?? '' }}">
                </div>

                <div class="mb-4">
                    <label for="instagram_url" class="block font-medium">Instagram URL</label>
                    <input type="text" name="instagram_url" id="instagram_url" class="w-full p-2 border rounded" value="{{ $footer->instagram_url ?? ''}}">
                </div>

                <div class="mb-4">
                    <label for="linkedin_url" class="block font-medium">LinkedIn URL</label>
                    <input type="text" name="linkedin_url" id="linkedin_url" class="w-full p-2 border rounded" value="{{ $footer->linkedin_url ?? ''}}">
                </div>

                <div class="mb-4">
                    <label for="copyright_text" class="block font-medium">Copyright Text</label>
                    <input type="text" name="copyright_text" id="copyright_text" class="w-full p-2 border rounded" value="{{ $footer->copyright_text ?? '' }}">
                    @error('copyright_text')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-6">
            <button type="submit" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Save Changes</button>
        </div>
    </form>
</div>

{{-- SweetAlert2 Success Popup --}}
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>@endif
@endsection