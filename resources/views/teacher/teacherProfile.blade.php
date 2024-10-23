@extends('layouts.app')

@section('title', 'Teacher Profile')
@section('content')

<x-brightsparks_header />
<x-teacher_sidebar />

<div class="p-6 mt-20 sm:ml-64">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class=" bg-blue-900 p-6 flex items-center">
            <img src="https://cdn-icons-png.flaticon.com/512/194/194936.png" alt="Profile Photo" class="w-32 h-32 rounded-full border-4 border-white shadow-md">
            <div class="ml-6 text-yellow-300">
                <h1 class="text-4xl font-bold">John Doe</h1>
                <p class="text-xl">Science Teacher</p>
                <p class="text-lg">Grade 10, Section A</p>
            </div>
        </div>

        <div class="p-6">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4">Profile Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach([
                    ['Full Name', 'John Michael Doe'],
                    ['Email', 'johndoe@example.com'],
                    ['Contact Number', '+123 456 7890'],
                    ['Address', '1234 Main St, City, Country'],
                    ['ID Number', 'T12345'],
                    ['Department', 'Science'],
                    ['Program', 'High School'],
                    ['Subject', 'Biology']
                ] as $info)
                    <div class="bg-gray-100 p-4 rounded-lg shadow transition-transform transform hover:scale-105">
                        <h3 class="text-lg font-semibold text-gray-700">{{ $info[0] }}</h3>
                        <p class="text-gray-600">{{ $info[1] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-10 flex justify-center space-x-4">
                <button class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg shadow-md hover:bg-blue-700 transition ease-in-out">
                    Edit Profile
                </button>
                <button class="px-6 py-2 bg-gray-300 text-gray-700 font-bold rounded-lg shadow-md hover:bg-gray-400 transition ease-in-out">
                    View Class Schedule
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
