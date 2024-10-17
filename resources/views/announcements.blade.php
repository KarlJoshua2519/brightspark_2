@extends('layouts.app')

@section('title', 'Announcements')
@section('content')

    <x-navbar />

    <div class="p-4">
        <div class="p-6 mt-14 bg-white shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
            <h1 class="text-4xl font-bold text-center text-blue-900 mb-8">School Announcements</h1>

            <!-- Announcements Section -->
            <div class="space-y-6">
                <!-- Repeatable Announcement Card -->
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold text-blue-800">Announcement Title 1</h2>
                    <p class="text-gray-600">This is a brief description of the announcement. It contains essential information for students and parents.</p>
                    <p class="text-sm text-gray-500 mt-2">Posted on: October 17, 2024</p>
                </div>

                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold text-blue-800">Announcement Title 2</h2>
                    <p class="text-gray-600">This is a brief description of another important announcement, providing updates regarding school activities.</p>
                    <p class="text-sm text-gray-500 mt-2">Posted on: October 10, 2024</p>
                </div>

                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold text-blue-800">Announcement Title 3</h2>
                    <p class="text-gray-600">Details about upcoming events, changes in schedules, or any other relevant information.</p>
                    <p class="text-sm text-gray-500 mt-2">Posted on: October 5, 2024</p>
                </div>

                <!-- More announcements can be added in similar structure -->
            </div>

            <!-- Button to Add New Announcement (if applicable) -->
            
        </div>
    </div>

@endsection
