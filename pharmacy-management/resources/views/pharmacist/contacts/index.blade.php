@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-xl rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Contact Messages</h1>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="border px-4 py-2 bg-orange-300">Name</th>
                <th class="border px-4 py-2 bg-orange-300">Email</th>
                <th class="border px-4 py-2 bg-orange-300">Subject</th>
                <th class="border px-4 py-2 bg-orange-300">Message</th>
                <th class="border px-4 py-2 bg-orange-300">Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td class="border px-4 py-2 bg-slate-200">{{ $contact->name }}</td>
                    <td class="border px-4 py-2 bg-slate-200">{{ $contact->email }}</td>
                    <td class="border px-4 py-2 bg-slate-200">{{ $contact->subject }}</td>
                    <td class="border px-4 py-2 bg-slate-200">{{ $contact->message }}</td>
                    <td class="border px-4 py-2 bg-slate-200">{{ $contact->created_at->format('d M Y, h:i A') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
     <!-- Pagination Links -->
     <div class="mt-4">
        {{ $contacts->links() }}
    </div>
</div>
@endsection
