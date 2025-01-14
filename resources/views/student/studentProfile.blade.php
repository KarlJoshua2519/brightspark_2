@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')

<x-brightsparks_header />

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<x-student_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-6 mt-14 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-white shadow-lg">

        <h1 class="text-4xl font-bold mb-8 text-center text-gray-800">Student Profile</h1>

        <div class="flex flex-col lg:flex-row items-center lg:items-start bg-gray-50 p-6 rounded-lg shadow-inner">
           
               
            <div class="w-48 h-48 rounded-full overflow-hidden shadow-lg mb-6 lg:mb-0 lg:mr-8 border-4 border-gray-300">
                <!-- Display the profile picture -->
                <img src="{{ $student->profile_picture ? asset('storage/' . $student->profile_picture) : 'default_profile_picture.png' }}" alt="Student Profile Picture" class="object-cover w-full h-full">
            </div>
            <div class="lg:ml-8 w-full lg:w-2/3 bg-white p-6 rounded-lg shadow-lg">
                <!-- Form for updating the profile picture -->
                <form action="{{ route('student.updateProfilePicture') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <label for="profile_picture" class="block text-sm font-medium text-gray-500 mr-4">Upload Profile Picture</label>
                            <input type="file" id="profile_picture" name="profile_picture" class="border-2 p-2 rounded-md" accept="image/*">
    
                        </div>
                        
                        <div class="mt-6">
                            <button class="text-white bg-blue-500 rounded-lg py-3 px-6 hover:text-blue-700" data-modal-toggle="editProfileModal">Edit Profile</button>
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-md">Upload</button>
                </form>
                

                

                <h2 class="text-2xl font-semibold mb-6 text-gray-700 border-b-2 pb-2 border-gray-300">Personal Information</h2>
                <!-- Display personal information here as before -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- First Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">First Name</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $student->name }}</p>
                    </div>
                    <!-- Middle Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Middle Name</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $student->middleName ?? 'N/A' }}</p>
                    </div>
                    <!-- Last Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Last Name</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $student->lastName }}</p>
                    </div>
                    <!-- Sex -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Sex</label>
                        <p class="text-lg font-semibold text-gray-900">{{ ucfirst($student->sex) }}</p>
                    </div>
                    <!-- Birthday -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Birthday</label>
                        <p class="text-lg font-semibold text-gray-900">{{ \Carbon\Carbon::parse($student->birthday)->format('F j, Y') }}</p>
                    </div>
                    <!-- Address -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Address</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $student->address }}</p>
                    </div>
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Email</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $student->email }}</p>
                    </div>
                    <!-- Contact Number -->
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Contact Number</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $student->contact_number }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic Information -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6 text-gray-700 border-b-2 pb-2 border-gray-300">Academic Information</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Grade -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Grade</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $student->grade }}</p>
                </div>
                <!-- Section -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Section</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $student->section }}</p>
                </div>
                <!-- LRN -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">LRN</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $student->lrn }}</p>
                </div>
            </div>
        </div>

        <div class="mt-10">
            <h2 class="text-2xl font-semibold mb-6 text-gray-700 border-b-2 pb-2 border-gray-300">Emergency Contact</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Contact Person -->
                <div>
                    <label class="block text-sm font-medium text-gray-500">Contact Person</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $student->contactperson }}</p>
                </div>
               
                <div>
                    <label class="block text-sm font-medium text-gray-500">Contact Person Number</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $student->contactperson_number }}</p>
                </div>


              
            </div>
        </div>

    </div>
</div>


<div id="editProfileModal" class="fixed inset-0 z-50 hidden justify-center items-center bg-gray-800 bg-opacity-50">
    <div class="bg-white p-6 rounded-lg w-1/2">
        <h2 class="text-2xl font-semibold mb-6 text-gray-700">Edit Profile</h2>

        <!-- Edit Profile Form -->
        <form action="{{ route('student.updateProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Profile Picture -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-500">Profile Picture</label>
                <input type="file" name="profile_picture" class="mt-2 block w-full text-gray-900 border border-gray-300 rounded-md" accept="image/*">
            </div>

            <!-- First Name -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-500">First Name</label>
                <input type="text" name="name" value="{{ $student->name }}" class="mt-2 block w-full text-gray-900 border border-gray-300 rounded-md">
            </div>

            <!-- Last Name -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-500">Last Name</label>
                <input type="text" name="lastName" value="{{ $student->lastName }}" class="mt-2 block w-full text-gray-900 border border-gray-300 rounded-md">
            </div>

            <!-- Contact Number -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-500">Contact Number</label>
                <input type="text" name="contact_number" value="{{ $student->contact_number }}" class="mt-2 block w-full text-gray-900 border border-gray-300 rounded-md">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white hover:bg-blue-700 py-2 px-4 rounded-md">Save Changes</button>
        </form>

        <!-- Close Button -->
        <button type="button" class="absolute top-2 right-2 text-gray-500" data-modal-toggle="editProfileModal">
            <span class="text-2xl">&times;</span>
        </button>
    </div>
</div>

<script>
    // Modal toggle functionality
    document.querySelectorAll('[data-modal-toggle="editProfileModal"]').forEach(button => {
        button.addEventListener('click', () => {
            const modal = document.getElementById('editProfileModal');
            modal.classList.toggle('hidden');
        });
    });
</script>
@endsection
