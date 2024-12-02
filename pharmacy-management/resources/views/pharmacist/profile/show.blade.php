@extends('layouts.app')

@section('content')
<div class="container my-5 mt-8">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="flex space-x-4">
            <!-- Profile Card (Left) -->
            <div class="card shadow-lg border-0 rounded-lg px-8 my-6" style="width: 30rem;">
                <div class="card-header bg-white">
                    <h2 class="mb-0 text-xl">Pharmacist Profile</h2>
                </div>
                <div class="card-body ">
                    <div class="text-center">
                        <img src="{{ asset('/img/list1.jpg') }}" alt="Profile Image" class=" px-2 mb-3" style="width: 120px; height: 100px; border-radius:50%">
                    </div>
                    <div class="mt-4">
                        <!-- Name -->
                        <div class="mb-4">
                            <h5 class="text-secondary px-6"><strong>Name:</strong></h5>
                            <table>
                                <tr>
                                    <th class="px-6">{{ $pharmacist->name }}</th>
                                </tr>
                            </table>
                        </div>
                        <!-- Email -->
                        <div class="mb-4">
                            <h5 class="text-secondary px-6"><strong>Email:</strong></h5>
                            <table>
                                <tr>
                                    <th class="px-6">{{ $pharmacist->email }}</th>
                                </tr>
                            </table>
                        </div>
                        <!-- Role -->
                        <div class="mb-4">
                            <h5 class="text-secondary px-6"><strong>Role:</strong></h5>
                            <table>
                                <tr>
                                    <th class="px-6">{{ $pharmacist->role }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Edit Form Card (Right) -->
            <div class="card shadow-lg px-6 border rounded-lg" style="width: 40rem;">
                <div class="card-header bg-success text-dark text-center">
                    <h2 class="mb-0">Edit Profile</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('pharmacist.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control w-full rounded-md" id="name" name="name" value="{{ $pharmacist->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control w-full rounded-md" id="email" name="email" value="{{ $pharmacist->email }}">
                        </div>
                        <button type="submit" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Save Changes</button>
                    </form>
                    @if(session('success'))
                    <div class="w-full bg-green-400 px-4 py-2 border rounded-md">
                        {{session('success')}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection