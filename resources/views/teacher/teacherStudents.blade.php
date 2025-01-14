@extends('layouts.app')

@section('title', 'My Students')
@section('content')

<x-brightsparks_header />
<x-teacher_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-6 mt-14 bg-gray-50 shadow-lg rounded-lg border border-gray-200">
        <h1 class="text-4xl font-bold text-center text-blue-900 mb-10">My Students</h1>

        <!-- Search Field -->
        <div class="mb-8">
            <input 
                type="text" 
                placeholder="Search Students..." 
                class="border border-gray-300 rounded-lg p-3 w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" 
            />
        </div>

        <!-- Student List -->
        <div class="grid grid-cols-3 gap-6">
            @foreach($students as $student)
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="flex flex-col items-center">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $student->name }} {{ $student->middleName }} {{ $student->lastName }}</h2>

                     <p class="text-sm text-gray-700 tracking-wide ">
                           LRN: <span class="font-medium">{{ $student->lrn }}</span>
                        </p>
                        <p class="text-gray-700">Grade {{ $student->grade }} - Section {{ $student->section }}</p>

                        <div class=" mt-4 flex flex-row items-center justify-between w-full">
                            <div>
                               
                                <p class="text-gray-700"><span class="font-medium">Sex:</span>  <span class="uppercase">{{ $student->sex }}</span>   </p>
                                <p class="text-gray-600">
                                    <span class="font-medium">Email:</span> {{ $student->email }}<br>
                                    <span class="font-medium">Phone:</span> {{ $student->contact_number }}<br>
                                    <span class="font-medium">Address:</span> {{ $student->address }}<br>
                                    <span class="font-medium">Email:</span> {{ $student->email }}
                                </p>
                            </div>

                            <div>
                              
                                <p class="text-gray-600 ">
                                    <span class="font-medium">Contact Person:</span> {{ $student->contactperson }}<br>
                                    <span class="font-medium">Contact Person's Number:</span> {{ $student->contactperson_number }}
                                </p>
                               
                            </div>
                            

                        </div>
                    
                    
                    
                    
                    
                    
                    {{-- <!-- Left Section -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">{{ $student->name }} {{ $student->middleName }} {{ $student->lastName }}</h2>
                        <p class="text-gray-500">Grade {{ $student->grade }} - {{ $student->section }}</p>
                        <p class="text-gray-600 mt-4">
                            <span class="font-medium">Sex:</span> {{ $student->sex }}<br>
                            <span class="font-medium">Birthday:</span> {{ $student->birthday }}
                        </p>
                    </div>

                    <!-- Right Section -->
                    <div>
                        <p class="text-gray-600">
                            <span class="font-medium">Email:</span> {{ $student->email }}<br>
                            <span class="font-medium">Phone:</span> {{ $student->contact_number }}<br>
                            <span class="font-medium">Address:</span> {{ $student->address }}
                        </p>
                        <p class="text-gray-600 mt-4">
                            <span class="font-medium">Contact Person:</span> {{ $student->contactperson }}<br>
                            <span class="font-medium">Contact Person's Number:</span> {{ $student->contactperson_number }}
                        </p>
                        <p class="text-gray-600 mt-4">
                            <span class="font-medium">LRN:</span> {{ $student->lrn }}
                        </p>
                    </div> --}}
                </div>

                <!-- Action -->
                <div class="mt-4 flex justify-end">
                    <a 
                        href="mailto:{{ $student->email }}" 
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors duration-200"
                    >
                        Email Student
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
