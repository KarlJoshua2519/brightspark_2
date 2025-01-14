@extends('layouts.app')

@section('title', 'My Subjects')
@section('content')

<x-brightsparks_header />
<x-teacher_sidebar />
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="p-6 sm:ml-64 mt-16">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-3xl font-semibold text-gray-800 mb-8 text-center">My Subjects</h2>

        <!-- Filter Options -->
        <div class="mb-6 text-center">
            <label for="filter" class="text-gray-600 text-lg">Filter by Department:</label>
            <select id="filter" class="ml-3 p-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                <option value="">All</option>
                <option value="science">Science</option>
                <option value="mathematics">Mathematics</option>
                <option value="language">Language</option>
                <option value="humanities">Humanities</option>
            </select>
        </div>

        <!-- Subject Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
            @foreach($subjects as $subject)
                <div class="bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-xl transition-all duration-300 ease-in-out p-6">
                    <h3 class="text-xl font-medium text-gray-800">{{ $subject->name }}</h3>
                    <p class="text-gray-600 text-sm mt-2">{{ $subject->description }}</p>
                    <div class="mt-4 flex justify-between items-center">
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" onclick="alert('Details for {{ $subject->name }}: {{ $subject->description }}')">
                            View Details
                        </button>
                        <span class="text-gray-400 text-sm">{{ $subject->department }}</span> <!-- Display department -->
                    </div>
                </div>
            @endforeach
        </div>

        <!-- No subjects message -->
        @if($subjects->isEmpty())
            <p class="text-center text-gray-500 mt-6">You are not assigned to any subjects.</p>
        @endif
    </div>
</div>

@endsection