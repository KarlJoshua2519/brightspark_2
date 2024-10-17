@extends('layouts.app')

@section('title', 'My Students')
@section('content')

<x-brightsparks_header />
<x-teacher_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-6 mt-14 bg-white shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
        <h1 class="text-4xl font-bold text-center text-blue-900 mb-8">My Students</h1>

        <!-- Search Bar -->
        <div class="mb-6">
            <input type="text" placeholder="Search Students..." class="border rounded-lg p-2 w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <!-- Student Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Sample Student Card -->
            <div class="bg-white shadow-md rounded-lg p-4 border border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">John Doe</h2>
                <p class="text-gray-600">Email: john.doe@example.com</p>
                <p class="text-gray-600">Phone: 123-456-7890</p>
                <div class="mt-4 flex justify-between">
                    <a href="mailto:john.doe@example.com" class="text-blue-600 hover:underline">Email</a>
                    <button class="text-red-600 hover:underline" onclick="confirmDelete('John Doe')">Delete</button>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 border border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Jane Smith</h2>
                <p class="text-gray-600">Email: jane.smith@example.com</p>
                <p class="text-gray-600">Phone: 987-654-3210</p>
                <div class="mt-4 flex justify-between">
                    <a href="mailto:jane.smith@example.com" class="text-blue-600 hover:underline">Email</a>
                    <button class="text-red-600 hover:underline" onclick="confirmDelete('Jane Smith')">Delete</button>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 border border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Emily Johnson</h2>
                <p class="text-gray-600">Email: emily.johnson@example.com</p>
                <p class="text-gray-600">Phone: 456-789-0123</p>
                <div class="mt-4 flex justify-between">
                    <a href="mailto:emily.johnson@example.com" class="text-blue-600 hover:underline">Email</a>
                    <button class="text-red-600 hover:underline" onclick="confirmDelete('Emily Johnson')">Delete</button>
                </div>
            </div>

            <!-- Add more student cards as needed -->
        </div>
    </div>
</div>

<script>
    function confirmDelete(studentName) {
        if (confirm(`Are you sure you want to delete ${studentName}?`)) {
            // Logic to delete student can go here (e.g., a delete request)
            alert(`${studentName} has been deleted.`); // Placeholder for confirmation
        }
    }
</script>

@endsection
