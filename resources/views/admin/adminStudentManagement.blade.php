@extends('layouts.app')

@section('title', 'Admin - Student Management')
@section('content')

<x-brightsparks_header />
<x-admin_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Student Management</h1>
        
        <!-- Search and Filter Section -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
            <!-- Search Input -->
            <div class="relative w-full md:w-1/2">
                <input type="text" id="searchInput" placeholder="Search by name..." class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <div class="absolute right-3 top-2.5 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            
            <!-- Sort Dropdowns -->
            <div class="flex space-x-4">
                <div>
                    <label for="grade" class="block text-gray-700 font-medium mb-1">Sort by Grade</label>
                    <select id="grade" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Grade</option>
                        <option value="Grade 10">Grade 10</option>
                        <option value="Grade 11">Grade 11</option>
                        <option value="Grade 12">Grade 12</option>
                    </select>
                </div>
                <div>
                    <label for="section" class="block text-gray-700 font-medium mb-1">Sort by Section</label>
                    <select id="section" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Section</option>
                        <option value="Section A">Section A</option>
                        <option value="Section B">Section B</option>
                        <option value="Section C">Section C</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Student Profile Cards in List Layout -->
        <div class="space-y-6" id="studentCards">
            @foreach($students as $student)
            <div class="student-card flex flex-col md:flex-row items-center bg-gradient-to-r from-blue-50 to-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition-all duration-300"
            data-grade="{{ $student->grade }}" 
            data-section="{{ $student->section }}" 
            data-name="{{ $student->name }}"
            data-middleName="{{ $student->middleName }}"  
            data-lastName="{{ $student->lastName }}"     
            data-sex="{{ $student->sex }}"
            data-birthday="{{ \Carbon\Carbon::parse($student->birthday)->format('Y-m-d') }}"
            data-address="{{ $student->address }}"
            data-email="{{ $student->email }}"
            data-contact_number="{{ $student->contact_number }}"
            data-contactperson="{{ $student->contactperson }}"
            data-contactperson_number="{{ $student->contactperson_number }}"
            data-lrn="{{ $student->lrn }}" 
            data-id="{{ $student->id }}">
        
                <div class="flex-shrink-0">
                    <div class="h-20 w-20 bg-blue-500 text-white flex items-center justify-center rounded-full text-2xl font-bold shadow-md">
                        {{ strtoupper(substr($student->name, 0, 1)) }}
                    </div>
                </div>
                <div class="flex-grow md:ml-6 mt-4 md:mt-0">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ $student->name }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-600">
                        <p><strong>Sex:</strong> {{ $student->sex }}</p>
                        <p><strong>Birthday:</strong> {{ \Carbon\Carbon::parse($student->birthday)->format('F j, Y') }}</p>
                        <p><strong>Address:</strong> {{ $student->address }}</p>
                        <p><strong>Email:</strong> {{ $student->email }}</p>
                        <p><strong>Contact:</strong> {{ $student->contact_number }}</p>
                        <p><strong>Contact Person:</strong> {{ $student->contactperson }} ({{ $student->contactperson_number }})</p>
                        <p><strong>Grade:</strong> {{ $student->grade }}</p>
                        <p><strong>Section:</strong> {{ $student->section }}</p>
                        <p><strong>LRN:</strong> {{ $student->lrn }}</p>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 md:ml-6 text-center">
                    <button class="edit-btn text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg shadow-md font-medium transition" data-id="{{ $student->id }}">Edit Details</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



<!-- Modal for Editing Student -->
<div id="editModal" class="hidden fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-50">
    <div class="bg-white p-6 rounded-lg w-full md:w-1/2">
        <h2 class="text-xl font-semibold mb-4">Edit Student Details</h2>
        <form id="editForm" action="{{ route('admin.student.update') }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" id="studentId" name="id">

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Middle Name -->
            <div class="mb-4">
                <label for="middleName" class="block text-gray-700">Middle Name</label>
                <input type="text" id="middleName" name="middleName" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Last Name -->
            <div class="mb-4">
                <label for="lastName" class="block text-gray-700">Last Name</label>
                <input type="text" id="lastName" name="lastName" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Sex -->
            <div class="mb-4">
                <label for="sex" class="block text-gray-700">Sex</label>
                <select id="sex" name="sex" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <!-- Birthday -->
            <div class="mb-4">
                <label for="birthday" class="block text-gray-700">Birthday</label>
                <input type="date" id="birthday" name="birthday" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block text-gray-700">Address</label>
                <input type="text" id="address" name="address" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Contact Number -->
            <div class="mb-4">
                <label for="contact_number" class="block text-gray-700">Contact Number</label>
                <input type="text" id="contact_number" name="contact_number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Contact Person -->
            <div class="mb-4">
                <label for="contactperson" class="block text-gray-700">Contact Person</label>
                <input type="text" id="contactperson" name="contactperson" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Contact Person Number -->
            <div class="mb-4">
                <label for="contactperson_number" class="block text-gray-700">Contact Person Number</label>
                <input type="text" id="contactperson_number" name="contactperson_number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Grade -->
            <div class="mb-4">
                <label for="grade" class="block text-gray-700">Grade</label>
                <select id="grade" name="grade" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Grade 10">Grade 10</option>
                    <option value="Grade 11">Grade 11</option>
                    <option value="Grade 12">Grade 12</option>
                </select>
            </div>

            <!-- Section -->
            <div class="mb-4">
                <label for="section" class="block text-gray-700">Section</label>
                <input type="text" id="section" name="section" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- LRN -->
            <div class="mb-4">
                <label for="lrn" class="block text-gray-700">LRN</label>
                <input type="text" id="lrn" name="lrn" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Save Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Save</button>
            </div>
        </form>

        <button id="cancelBtn" class="mt-4 text-gray-700 hover:text-gray-500">Cancel</button>
    </div>
</div>


<script>
   // Show the modal and populate the fields with student data
document.querySelectorAll('.edit-btn').forEach(function(button) {
    button.addEventListener('click', function() {
        // Get the student ID from the button data-id attribute
        const studentId = this.getAttribute('data-id');
        
        // Find the student card that the button belongs to
        const studentCard = this.closest('.student-card');
        
        // Get student data from the card's data attributes
        const name = studentCard.querySelector('h2').textContent;
        const middleName = studentCard.getAttribute('data-middleName');
        const lastName = studentCard.getAttribute('data-lastName');
        const sex = studentCard.getAttribute('data-sex');
        const birthday = studentCard.getAttribute('data-birthday');
        const address = studentCard.getAttribute('data-address');
        const email = studentCard.getAttribute('data-email');
        const contactNumber = studentCard.getAttribute('data-contact_number');
        const contactPerson = studentCard.getAttribute('data-contactperson');
        const contactPersonNumber = studentCard.getAttribute('data-contactperson_number');
        const grade = studentCard.getAttribute('data-grade');
        const section = studentCard.getAttribute('data-section');
        const lrn = studentCard.getAttribute('data-lrn');

        // Populate the form fields inside the modal
        document.getElementById('studentId').value = studentId;
        document.getElementById('name').value = name;
        document.getElementById('middleName').value = middleName || '';  // Ensure middleName is set even if empty
        document.getElementById('lastName').value = lastName || '';  // Ensure lastName is set even if empty
        document.getElementById('sex').value = sex;
        document.getElementById('birthday').value = birthday;
        document.getElementById('address').value = address;
        document.getElementById('email').value = email;
        document.getElementById('contact_number').value = contactNumber;
        document.getElementById('contactperson').value = contactPerson;
        document.getElementById('contactperson_number').value = contactPersonNumber;
        document.getElementById('grade').value = grade;
        document.getElementById('section').value = section;
        document.getElementById('lrn').value = lrn;

        // Show the modal
        document.getElementById('editModal').classList.remove('hidden');
    });
});

// Hide the modal when the cancel button is clicked
document.getElementById('cancelBtn').addEventListener('click', function() {
    document.getElementById('editModal').classList.add('hidden');
});

</script>


@endsection
