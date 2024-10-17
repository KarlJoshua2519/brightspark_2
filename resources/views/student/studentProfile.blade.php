@extends('layouts.app') @section('title', 'Student Profile') @section('content')

<x-brightsparks_header /> @if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<x-student_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-6 mt-14 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-white shadow-lg">

        <h1 class="text-4xl font-bold mb-8 text-center text-gray-800">Student Profile</h1>

        <div class="flex flex-col lg:flex-row items-center lg:items-start bg-gray-50 p-6 rounded-lg shadow-inner">
            <!-- Profile Picture -->
            <div class="w-48 h-48 rounded-full overflow-hidden shadow-lg mb-6 lg:mb-0 lg:mr-8 border-4 border-gray-300">
                <img src="https://static.vecteezy.com/system/resources/previews/022/484/648/original/smiling-3d-student-boy-with-backpack-on-white-background-transparent-background-free-png.png" alt="Student Profile Picture" class="object-cover w-full h-full">
            </div>

            <!-- Student Information -->
            <div class="lg:ml-8 w-full lg:w-2/3 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-6 text-gray-700 border-b-2 pb-2 border-gray-300">Personal Information
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- First Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">First Name</label>
                        <p class="text-lg font-semibold text-gray-900">John</p>
                    </div>
                    <!-- Middle Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Middle Name</label>
                        <p class="text-lg font-semibold text-gray-900">Michael</p>
                    </div>
                    <!-- Last Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Last Name</label>
                        <p class="text-lg font-semibold text-gray-900">Doe</p>
                    </div>
                    <!-- Sex -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Sex</label>
                        <p class="text-lg font-semibold text-gray-900">Male</p>
                    </div>
                    <!-- Birthday -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Birthday</label>
                        <p class="text-lg font-semibold text-gray-900">January 15, 2005</p>
                    </div>
                    <!-- Address -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Address</label>
                        <p class="text-lg font-semibold text-gray-900">123 Main St, Springfield</p>
                    </div>
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Email</label>
                        <p class="text-lg font-semibold text-gray-900">johndoe@example.com</p>
                    </div>
                    <!-- Contact Number -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Contact Number</label>
                        <p class="text-lg font-semibold text-gray-900">(123) 456-7890</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic Information -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6 text-gray-700 border-b-2 pb-2 border-gray-300">Academic Information
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Grade -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Grade</label>
                    <p class="text-lg font-semibold text-gray-900">10</p>
                </div>
                <!-- Section -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Section</label>
                    <p class="text-lg font-semibold text-gray-900">A</p>
                </div>
                <!-- LRN -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">LRN</label>
                    <p class="text-lg font-semibold text-gray-900">123456789012</p>
                </div>
            </div>
            <div class="mt-10">
                <h2 class="text-2xl font-semibold mb-6 text-gray-700 border-b-2 pb-2 border-gray-300">Emergency Contact
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Contact Person -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Contact Person</label>
                        <p class="text-lg font-semibold text-gray-900">Jane Doe</p>
                    </div>
                    <!-- Contact Person Number -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Contact Person Number</label>
                        <p class="text-lg font-semibold text-gray-900">(987) 654-3210</p>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>

@endsection