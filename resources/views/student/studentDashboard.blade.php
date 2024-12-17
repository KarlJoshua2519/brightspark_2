@extends('layouts.app')

@section('title', 'Student Dashboard')
@section('content')

    <x-brightsparks_header />

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <x-student_sidebar />

    <div class="p-4 sm:ml-64">

        <div class="p-6 mt-14 bg-white shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">


            <h1 class="text-3xl font-bold text-gray-800 mb-6">
                Welcome, {{ $student->name }}!
            </h1>

   
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                <div class="p-4 bg-blue-100 border border-blue-200 rounded-lg shadow hover:bg-blue-200 transition duration-300">
                    <h2 class="text-lg font-semibold text-blue-800">Grades</h2>
                    <p class="text-blue-600">View your current grades</p>
                    <a class="block text-right text-blue-600 font-bold mt-4">Go to Grades →</a>
                </div>

             
                <div class="p-4 bg-green-100 border border-green-200 rounded-lg shadow hover:bg-green-200 transition duration-300">
                    <h2 class="text-lg font-semibold text-green-800">Subjects</h2>
                    <p class="text-green-600">Check your subjects</p>
                    <a  class="block text-right text-green-600 font-bold mt-4">Go to Subjects →</a>
                </div>

             
                <div class="p-4 bg-yellow-100 border border-yellow-200 rounded-lg shadow hover:bg-yellow-200 transition duration-300">
                    <h2 class="text-lg font-semibold text-yellow-800">Recent Activity</h2>
                    <p class="text-yellow-600">See your latest updates</p>
                    <a href="#" class="block text-right text-yellow-600 font-bold mt-4">View Activity →</a>
                </div>
            </div>

  
            <div class="mt-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Recent Announcements</h2>
                <ul class="space-y-4">
                  
                    <li class="p-4 bg-gray-100 border border-gray-200 rounded-lg shadow hover:bg-gray-200 transition duration-300">
                        <h3 class="text-lg font-semibold text-gray-700">Midterm Exam Schedule</h3>
                        <p class="text-gray-600">The midterm exams will start on November 1, 2024...</p>
                        <span class="block text-right text-sm text-gray-500 mt-2">Posted on October 16, 2024</span>
                    </li>

       
                </ul>
            </div>

        </div>
    </div>

@endsection
