@extends('layouts.app')

@section('title', 'My Subjects')
@section('content')

<x-brightsparks_header />
<x-teacher_sidebar />

<div class="p-6 sm:ml-64 mt-16">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">My Subjects</h2>

        <!-- Filter Options -->
        <div class="mb-4 text-center">
            <label for="filter" class="text-gray-600">Filter by Department:</label>
            <select id="filter" class="ml-2 border border-gray-300 rounded-md p-2">
                <option value="">All</option>
                <option value="science">Science</option>
                <option value="mathematics">Mathematics</option>
                <option value="language">Language</option>
                <option value="humanities">Humanities</option>
            </select>
        </div>

        <!-- Subject Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            @foreach([
                ['name' => 'Biology 101', 'department' => 'Science', 'description' => 'Introduction to Biology'],
                ['name' => 'Chemistry 101', 'department' => 'Science', 'description' => 'Basics of Chemistry'],
                ['name' => 'Physics 101', 'department' => 'Science', 'description' => 'Understanding Physics'],
                ['name' => 'Mathematics 101', 'department' => 'Mathematics', 'description' => 'Fundamentals of Mathematics'],
                ['name' => 'English Literature', 'department' => 'Language', 'description' => 'Study of English Literature'],
                ['name' => 'World History', 'department' => 'Humanities', 'description' => 'Exploration of World History']
            ] as $subject)
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm hover:shadow-md transition duration-200">
                    <h3 class="text-lg font-medium text-gray-700">{{ $subject['name'] }}</h3>
                    <p class="text-gray-500 text-sm">{{ $subject['description'] }}</p>
                    <div class="mt-4 flex justify-end">
                        <button class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200" onclick="alert('Details for {{ $subject['name'] }}: {{ $subject['description'] }}')">
                            View Details
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- No subjects message -->
        @if(empty($subjects))
            <p class="text-center text-gray-500 mt-4">You are not assigned to any subjects.</p>
        @endif
    </div>
</div>

@endsection
