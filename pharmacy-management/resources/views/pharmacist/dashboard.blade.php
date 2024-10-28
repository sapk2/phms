@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-2xl font-semibold mb-4">Dashboard Overview</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- User Count Card -->
        <div class="bg-red-300 shadow-md rounded-lg p-4 text-center">
            <h3 class="text-xl font-semibold">Users</h3>
            <p class="text-3xl font-bold ">{{ $userCount }}</p>
        </div>
        
        <!-- Medication Count Card -->
        <div class="bg-yellow-400 shadow-md rounded-lg p-4 text-center">
            <h3 class="text-xl font-semibold">Medications</h3>
            <p class="text-3xl font-bold">{{ $medicationCount }}</p>
        </div>

        <!-- Prescription Count Card -->
        <div class="bg-blue-300 shadow-md rounded-lg p-4 text-center">
            <h3 class="text-xl font-semibold">Prescriptions</h3>
            <p class="text-3xl font-bold">{{ $prescriptionCount }}</p>
        </div>

        <!-- Sales Count Card -->
        <div class="bg-white shadow-md rounded-lg p-4 text-center">
            <h3 class="text-xl font-semibold">Sales</h3>
            <p class="text-3xl font-bold">{{ $salesCount }}</p>
        </div>
    </div>

    <!-- Recent Notifications Marquee -->
    <div class="mt-6">
        <h3 class="text-xl font-semibold mb-2">Recent Notifications</h3>
        
        <!-- Marquee Effect using CSS -->
        <div class="marquee-container overflow-hidden border rounded-lg p-2 bg-gray-100">
            <ul class="marquee-content flex space-x-8">
                <li>New medication added: Amoxicillin</li>
                <li>Prescription updates available.</li>
                <li>Low stock alert for Paracetamol.</li>
            </ul>
        </div>
    </div>
</div>

<style>
    .marquee-container {
        white-space: nowrap;
        overflow: hidden;
    }
    .marquee-content {
        display: inline-flex;
        animation: marquee 12s linear infinite;
    }
    @keyframes marquee {
        from { transform: translateX(100%); }
        to { transform: translateX(-100%); }
    }
</style>

@endsection
