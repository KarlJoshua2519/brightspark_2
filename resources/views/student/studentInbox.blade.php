@extends('layouts.app') 
@section('title', 'Student Inbox') 
@section('content')

<x-brightsparks_header /> 

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<x-student_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-6 mt-14 bg-white shadow-md rounded-lg ">

        <!-- Header with Search and Filter -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-extrabold text-gray-800">Student Inbox</h1>

            <!-- Search Bar -->
            <div class="flex items-center bg-gray-100 border border-gray-300 rounded-lg px-3 py-1">
                <input 
                    type="text" 
                    class="bg-transparent outline-none text-gray-600 placeholder-gray-400" 
                    placeholder="Search messages..."
                />
                <span class="material-icons text-gray-500 ml-2">search</span>
            </div>
        </div>

        <!-- Message Filter Options -->
        <div class="flex justify-end mb-6">
            <button class="text-gray-600 px-4 py-2 border rounded-md border-gray-300 hover:bg-gray-100">
                All Messages
            </button>
            <button class="ml-4 text-gray-600 px-4 py-2 border rounded-md border-gray-300 hover:bg-gray-100">
                Unread
            </button>
            <button class="ml-4 text-gray-600 px-4 py-2 border rounded-md border-gray-300 hover:bg-gray-100">
                Read
            </button>
        </div>

        <!-- Message Cards Container -->
        <div class="space-y-4 overflow-auto h-96 pr-4">
            <!-- Example of a Message (Unread) -->
            <div class="p-4 bg-gray-100 rounded-lg border border-gray-300 hover:bg-gray-200 transition-all duration-300 cursor-pointer flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Professor Adams</h2>
                    <p class="text-gray-600">Exam Review Schedule</p>
                    <p class="text-sm text-gray-500 mt-1">Click to read the message...</p>
                </div>
                <div class="text-right text-gray-500">
                    <span class="block mb-1">October 16, 2024</span>
                    <span class="text-red-600 font-semibold">Unread</span>
                </div>
            </div>

            <!-- Example of a Message (Read) -->
            <div class="p-4 bg-white rounded-lg border border-gray-300 hover:bg-gray-50 transition-all duration-300 cursor-pointer flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-medium text-gray-700">Dr. Smith</h2>
                    <p class="text-gray-500">Project Feedback</p>
                    <p class="text-sm text-gray-400 mt-1">Click to read the message...</p>
                </div>
                <div class="text-right text-gray-500">
                    <span class="block mb-1">October 15, 2024</span>
                    <span class="text-green-600">Read</span>
                </div>
            </div>

            <!-- Add more message cards as needed -->
        </div>

        <!-- Pagination or Load More Button -->
        <div class="mt-6 flex justify-center">
            <button class="bg-blue-500 text-white py-2 px-4 rounded-full shadow-md hover:bg-blue-600 transition-all duration-300">
                Load More Messages
            </button>
        </div>

    </div>
</div>

@endsection
