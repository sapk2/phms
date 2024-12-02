@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-2xl font-semibold mb-4">Dashboard Overview</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        <!-- User Count Card -->
        <div class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            <h3 class="text-xl font-semibold">Users</h3>
            <p class="text-3xl font-bold ">{{ $userCount }}</p>
        </div>

        <!-- Medication Count Card -->
        <div class="text-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 dark:text-white focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
            <h3 class="text-xl font-semibold">Medications</h3>
            <p class="text-3xl font-bold">{{ $medicationCount }}</p>
        </div>

        <!-- Prescription Count Card -->
        <div class="text-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500  dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
            <h3 class="text-xl font-semibold">Prescriptions</h3>
            <p class="text-3xl font-bold">{{ $prescriptionCount }}</p>
        </div>

        <!-- Sales Count Card -->
        <div class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none dark:text-white focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            <h3 class="text-xl font-semibold">Sales</h3>
            <p class="text-3xl font-bold">{{ $salesCount }}</p>
        </div>
    </div>

    <!-- Recent Notifications Marquee -->
    <div class="mt-6">
        <h3 class="text-xl font-semibold mb-2">Recent Notifications</h3>

        <!-- Marquee Effect using CSS -->
        <div class="marquee-container overflow-hidden border rounded-lg p-2text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-md text-sm px-5 py-2.5 text-center me-2 mb-2">
            <ul class="marquee-content flex space-x-8 ">
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
        from {
            transform: translateX(100%);
        }

        to {
            transform: translateX(-100%);
        }
    }
</style>

@endsection