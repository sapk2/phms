@extends('layouts.app')

@section('content')

    <button onclick="window.print()" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">Print Report</button>
    <a href="{{route('pharmacist.reports.generateinventoryreport')}}">click</a>
@endsection
