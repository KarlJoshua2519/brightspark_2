@extends('layouts.app') 
@section('title', 'Student Grade') 
@section('content')

<x-brightsparks_header /> 

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<x-student_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-6 mt-14 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl">

        <h1 class="text-4xl font-extrabold mb-8 text-center text-blue-900">Student Grades</h1>

        <!-- Student Grades Table with enhanced design -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-lg overflow-hidden">
                <thead class="bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                    <tr>
                        <th class="py-4 px-6 text-left font-bold text-lg">Subject</th>
                        <th class="py-4 px-6 text-left font-bold text-lg">Grade</th>
                        <th class="py-4 px-6 text-left font-bold text-lg">Credits</th>
                        <th class="py-4 px-6 text-left font-bold text-lg">Remarks</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <!-- Repeatable Grade Row with hover effect and alternating row colors -->
                    <tr class="bg-white hover:bg-blue-50 transition-all duration-300">
                        <td class="py-4 px-6 font-semibold">Mathematics</td>
                        <td class="py-4 px-6 font-semibold text-green-600">95%</td>
                        <td class="py-4 px-6">4</td>
                        <td class="py-4 px-6">
                            <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                                Excellent
                            </span>
                        </td>
                    </tr>
                    <tr class="bg-gray-50 hover:bg-blue-50 transition-all duration-300">
                        <td class="py-4 px-6 font-semibold">Biology</td>
                        <td class="py-4 px-6 font-semibold text-yellow-600">88%</td>
                        <td class="py-4 px-6">3</td>
                        <td class="py-4 px-6">
                            <span class="inline-block bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-semibold">
                                Good
                            </span>
                        </td>
                    </tr>
                    <!-- Add more subjects and grades as needed -->
                </tbody>
            </table>
        </div>

        <!-- Additional Design Element: Grade Summary Card -->
        <div class="mt-8 p-6 bg-gradient-to-r from-green-400 to-green-600 text-white rounded-lg shadow-lg text-center">
            <h2 class="text-2xl font-bold">Overall GPA: 3.8</h2>
            <p class="mt-2">Keep up the great work!</p>
        </div>

    </div>
</div>

@endsection
