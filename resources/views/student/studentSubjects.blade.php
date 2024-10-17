@extends('layouts.app') 
@section('title', 'Student Subject') 
@section('content')

<x-brightsparks_header /> 

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<x-student_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-6 mt-14 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-gradient-to-br from-white to-gray-50 h-screen shadow-lg">

        <h1 class="text-4xl font-extrabold mb-8 text-center text-blue-900">Student Subjects</h1>

        <!-- Subject Information Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Repeatable Subject Card -->
            <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition-shadow duration-300">
                <h2 class="text-2xl font-bold mb-4 text-blue-700 flex items-center">
                    Mathematics
                </h2>
                <p class="text-gray-600 flex items-center">
                    <span class="material-icons mr-2">Teacher:</span> Mr. Smith
                </p>
                <p class="text-gray-600 flex items-center mt-2">
                    <span class="material-icons mr-2">Schedule:</span> Mon, Wed, Fri - 10:00 AM
                </p>
                <p class="text-gray-600 flex items-center mt-2">
                    <span class="material-icons mr-2">Room:</span> Room 101
                </p>
                <!-- Tooltip Example (Optional) -->
                <span class="text-sm text-blue-500 hover:underline cursor-pointer" data-tooltip-target="tooltip-math">
                    View more details
                </span>
                <div id="tooltip-math" role="tooltip" class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-black rounded-lg shadow-sm opacity-0">
                    Algebra, Calculus, and Geometry covered in this course.
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>

            <!-- Second Subject Card -->
            <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition-shadow duration-300">
                <h2 class="text-2xl font-bold mb-4 text-blue-700 flex items-center">
                   Science
                </h2>
                <p class="text-gray-600 flex items-center">
                    <span class="material-icons mr-2">Teacher:</span> Dr. Adams
                </p>
                <p class="text-gray-600 flex items-center mt-2">
                    <span class="material-icons mr-2">Schedule:</span> Tue, Thu - 1:00 PM
                </p>
                <p class="text-gray-600 flex items-center mt-2">
                    <span class="material-icons mr-2">Room:</span> Room 202
                </p>
                <!-- Tooltip Example (Optional) -->
                <span class="text-sm text-blue-500 hover:underline cursor-pointer" data-tooltip-target="tooltip-bio">
                    View more details
                </span>
                <div id="tooltip-bio" role="tooltip" class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-black rounded-lg shadow-sm opacity-0">
                    Evolution, Ecology, and Cell Biology are part of this course.
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>

            <!-- Add more subject cards as needed -->
        </div>

    </div>
</div>

@endsection
