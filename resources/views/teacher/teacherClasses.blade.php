@extends('layouts.app')

@section('title', 'My Classes')
@section('content')

<x-brightsparks_header />
<x-teacher_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-6 mt-14  shadow-lg rounded-xl border border-gray-300 dark:border-gray-700">

        <!-- Page Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-5xl font-extrabold text-gray-800">My Classes</h1>
            
        </div>

        <!-- Class Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Class Card Example -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-blue-800">Mathematics - Grade 10</h2>
                    <span class="text-sm bg-blue-100 text-blue-800 px-3 py-1 rounded-full">Prelim</span>
                </div>
                <p class="text-gray-500 mt-2">Classroom: Room 101</p>
                <p class="text-gray-500">Schedule: Mon, Wed, Fri - 10:00 AM</p>
                <div class="mt-6 flex justify-between items-center">
                    <button class="bg-blue-500 text-white py-2 px-5 rounded-full hover:bg-blue-600 transition duration-300">
                        View Students
                    </button>
                    <button class="bg-yellow-400 text-white py-2 px-5 rounded-full hover:bg-yellow-500 transition duration-300">
                        Encode Grades
                    </button>
                </div>
            </div>

            <!-- Add more class cards as needed -->
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-blue-800">Science - Grade 9</h2>
                    <span class="text-sm bg-green-100 text-green-800 px-3 py-1 rounded-full">Midterm</span>
                </div>
                <p class="text-gray-500 mt-2">Classroom: Room 202</p>
                <p class="text-gray-500">Schedule: Tue, Thu - 1:00 PM</p>
                <div class="mt-6 flex justify-between items-center">
                    <button class="bg-blue-500 text-white py-2 px-5 rounded-full hover:bg-blue-600 transition duration-300">
                        View Students
                    </button>
                    <button class="bg-yellow-400 text-white py-2 px-5 rounded-full hover:bg-yellow-500 transition duration-300">
                        Encode Grades
                    </button>
                </div>
            </div>

            <!-- Add as many cards as you need -->
        </div>

        <!-- Encode Grades Modal (example structure) -->
        <div id="encodeGradesModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-2xl">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Encode Grades for Mathematics</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Student 1 -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-700 font-semibold">John Doe</p>
                        <input type="text" placeholder="Prelim" class="w-full mt-2 p-2 border rounded-lg" />
                        <input type="text" placeholder="Midterm" class="w-full mt-2 p-2 border rounded-lg" />
                        <input type="text" placeholder="Finals" class="w-full mt-2 p-2 border rounded-lg" />
                    </div>

                    <!-- Student 2 -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-700 font-semibold">Jane Smith</p>
                        <input type="text" placeholder="Prelim" class="w-full mt-2 p-2 border rounded-lg" />
                        <input type="text" placeholder="Midterm" class="w-full mt-2 p-2 border rounded-lg" />
                        <input type="text" placeholder="Finals" class="w-full mt-2 p-2 border rounded-lg" />
                    </div>
                    <!-- Add more students -->
                </div>

                <div class="mt-6 text-right">
                    <button class="bg-blue-500 text-white py-2 px-8 rounded-lg hover:bg-blue-600 transition duration-300">
                        Save Grades
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
