@extends('layouts.app')

@section('title', 'Admin - Class Management')
@section('content')

<x-brightsparks_header />
<x-admin_sidebar />
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

        <!-- Page Title -->
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Class Management</h1>

        <!-- Add Class Button -->
        <div class="mb-6 text-right">
            <button id="addClassButton" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">Add Class</button>
        </div>

        <!-- Class Cards List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($classes as $class)
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-all duration-300">
                    <div class="bg-gray-200 p-4 text-center">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $class->class_name }}</h2>
                        <p class="mt-2 text-sm text-gray-600">{{ $class->grade_level }}</p>
                    </div>
                    <div class="p-4">
                        <p><strong>Teacher:</strong> {{ $class->teacher }}</p>
                        <p><strong>Enrolled Students:</strong> {{ $class->students }}</p>
                        <div class="mt-4 flex justify-between">
                            <button class="text-yellow-600 hover:text-yellow-700 flex items-center space-x-2" onclick="editClass({{ $class->id }})">
                                <i class="fas fa-edit"></i><span>Edit</span>
                            </button>
                            <button class="text-red-600 hover:text-red-700 flex items-center space-x-2" onclick="deleteClass({{ $class->id }})">
                                <i class="fas fa-trash-alt"></i><span>Delete</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div id="classModal" class="fixed inset-0 flex flex-col bg-gray-500 bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Add / Edit Class</h2>
        
        <form id="classForm">
            <div class="mb-4">
                <label for="className" class="block text-gray-700">Class Name</label>
                <input type="text" id="className" name="className" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <div class="mb-4">
                <label for="teacher" class="block text-gray-700">Assign Teacher</label>
                <input type="text" id="teacher" name="teacher" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <div class="mb-4">
                <label for="gradeLevel" class="block text-gray-700">Grade Level</label>
                <select id="gradeLevel" name="gradeLevel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="Grade 1">Grade 1</option>
                    <option value="Grade 2">Grade 2</option>
                    <option value="Grade 3">Grade 3</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="students" class="block text-gray-700">Number of Students</label>
                <input type="number" id="students" name="students" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <div class="flex justify-end space-x-4">
                <button type="button" id="closeModalButton" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">Cancel</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
// Open modal for Add Class
document.getElementById('addClassButton').addEventListener('click', function() {
    document.getElementById('classModal').classList.remove('hidden');
    document.getElementById('classForm').reset();
});

// Close modal
document.getElementById('closeModalButton').addEventListener('click', function() {
    document.getElementById('classModal').classList.add('hidden');
});

// Handle Add/Edit Class form submission
document.getElementById('classForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const className = document.getElementById('className').value;
    const teacher = document.getElementById('teacher').value;
    const gradeLevel = document.getElementById('gradeLevel').value;
    const students = document.getElementById('students').value;

    // AJAX request to send class data to backend
    fetch("{{ route('admin.class.store') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Add CSRF token
        },
        body: JSON.stringify({
            className: className,
            teacher: teacher,
            gradeLevel: gradeLevel,
            students: students
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.message);
        alert(data.message);

        // Close modal after submission
        document.getElementById('classModal').classList.add('hidden');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('There was an error adding the class!');
    });
});

</script>

@endsection
