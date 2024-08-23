@extends('layouts.app')
@section('content')
<div class="p-4 sm:ml-45">
    <div class="p-4 border-2 border-gray-200 mt-14">
        <h2 class="font-bold text-3xl text-blue-500">Users</h2>
        <hr class="h-1 bg-blue-500">
        <div class="mt-10">
            <table class="w-full border">
                <thead>
                    <tr class="bg-blue-200">
                        <th class="border p-3">SN</th>
                        <th class="border p-3">Name</th>
                        <th class="border p-3">Email</th>
                        <th class="border p-3">ROLE</th>
                        <th class="border p-3">Gmail</th>
                        <th class="border p-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usermanagement as $user)
                    <tr>
                        <td class="border p-3">{{$user->id}}</td>
                        <td class="border p-3">{{$user->name}}</td>
                        <td class="border p-3">{{$user->email}}</td>
                        <td class="border p-3">{{$user->role}}</td>
                        <td class="border p-3">{{$user->google_id}}</td>
                        
                        <td class="border p-3">
                            <!-- Edit link -->
                            <a href="{{ route('pharmacist.user.useredit', ['id' => $user->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Edit</a>
                            <!-- Delete link -->
                            <a href="{{ route('pharmacist.user.userdelete', ['id' => $user->id]) }}" class="bg-red-500 text-white px-4 py-2 rounded-lg" onclick="return confirm('Are you sure to delete?')">Delete</a>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection