@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Contact Messages</h1>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Subject</th>
                <th class="border px-4 py-2">Message</th>
                <th class="border px-4 py-2">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td class="border px-4 py-2">{{ $contact->name }}</td>
                    <td class="border px-4 py-2">{{ $contact->email }}</td>
                    <td class="border px-4 py-2">{{ $contact->subject }}</td>
                    <td class="border px-4 py-2">{{ $contact->message }}</td>
                    <td class="border px-4 py-2">{{ $contact->created_at->format('d M Y, h:i A') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
