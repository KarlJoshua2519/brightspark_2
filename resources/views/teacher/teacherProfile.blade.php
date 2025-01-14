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
                <h1 class="text-4xl font-bold">{{ $teacher->name }} {{ $teacher->lastName }}</h1>
                <p class="text-xl">{{ $teacher->department }} Teacher</p>
                <p class="text-lg">Grade {{ $teacher->advisory_year }}, Section {{ $teacher->advisory_section }}</p>
            </div>
        </div>

        <div class="p-6">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4">Profile Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach([
                  ['Full Name', $teacher->name . ' ' . $teacher->middleName . ' ' . $teacher->lastName],
                  ['Email', $teacher->email],
                  ['Contact Number', $teacher->contact_number],
                  ['Address', $teacher->address],
                  ['ID Number', $teacher->id_number],
                  ['Department', $teacher->department],
                  ['Program', $teacher->program],
                  ['Subject', implode(', ', json_decode($teacher->subject))]
                ] as $info)
                    <div class="bg-gray-100 p-4 rounded-lg shadow transition-transform transform hover:scale-105">
                        <h3 class="text-lg font-semibold text-gray-700">{{ $info[0] }}</h3>
                        <p class="text-gray-600">{{ $info[1] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-10 flex justify-center space-x-4">
                <button id="openModalBtn" class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg shadow-md hover:bg-blue-700 transition ease-in-out">
                    Edit Profile
                </button>

                <a href="" class="px-6 py-2 bg-gray-300 text-gray-700 font-bold rounded-lg shadow-md hover:bg-gray-400 transition ease-in-out">
                    View Class Schedule
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center z-50 hidden">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>
        <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-700">First Name</label>
                <input type="text" id="name" name="name" value="{{ $teacher->name }}" class="w-full p-2 mt-1 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="middleName" class="block text-sm font-semibold text-gray-700">Middle Name</label>
                <input type="text" id="middleName" name="middleName" value="{{ $teacher->middleName }}" class="w-full p-2 mt-1 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="lastName" class="block text-sm font-semibold text-gray-700">Last Name</label>
                <input type="text" id="lastName" name="lastName" value="{{ $teacher->lastName }}" class="w-full p-2 mt-1 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ $teacher->email }}" class="w-full p-2 mt-1 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="contact_number" class="block text-sm font-semibold text-gray-700">Contact Number</label>
                <input type="text" id="contact_number" name="contact_number" value="{{ $teacher->contact_number }}" class="w-full p-2 mt-1 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-semibold text-gray-700">Address</label>
                <input type="text" id="address" name="address" value="{{ $teacher->address }}" class="w-full p-2 mt-1 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="department" class="block text-sm font-semibold text-gray-700">Department</label>
                <input type="text" id="department" name="department" value="{{ $teacher->department }}" class="w-full p-2 mt-1 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="program" class="block text-sm font-semibold text-gray-700">Program</label>
                <input type="text" id="program" name="program" value="{{ $teacher->program }}" class="w-full p-2 mt-1 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="subject" class="block text-sm font-semibold text-gray-700">Subjects</label>
                <input type="text" id="subject" name="subject" value="{{ implode(', ', json_decode($teacher->subject)) }}" class="w-full p-2 mt-1 border border-gray-300 rounded-md">
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <button type="button" id="closeModalBtn" class="px-6 py-2 bg-gray-300 text-gray-700 font-bold rounded-lg shadow-md hover:bg-gray-400">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg shadow-md hover:bg-blue-700">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Modal toggle logic
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const editModal = document.getElementById('editModal');

    // Open modal
    openModalBtn.addEventListener('click', () => {
        editModal.classList.remove('hidden');
    });

    // Close modal
    closeModalBtn.addEventListener('click', () => {
        editModal.classList.add('hidden');
    });

    // Close modal when clicking outside of it
    window.addEventListener('click', (event) => {
        if (event.target === editModal) {
            editModal.classList.add('hidden');
        }
    });
</script>

@endsection
