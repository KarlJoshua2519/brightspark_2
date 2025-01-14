@extends('layouts.app')

@section('title', 'Admin - Teacher Management')
@section('content')

<x-brightsparks_header />
<x-admin_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Teacher Management</h1>

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
                    <label for="department" class="block text-gray-700 font-medium mb-1">Sort by Department</label>
                    <select id="department" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Department</option>
                        <option value="Kinder">Kinder</option>
                        <option value="Elementary">Elementary</option>
                        <option value="High School">High School</option>
                    </select>
                </div>
                <div>
                    <label for="advisory_section" class="block text-gray-700 font-medium mb-1">Sort by Advisory Section</label>
                    <select id="advisory_section" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Section</option>
                        <option value="Section A">Section A</option>
                        <option value="Section B">Section B</option>
                        <option value="Section C">Section C</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Teacher Profile Cards in List Layout -->
        <div class="space-y-6" id="teacherCards">
            @foreach ($teachers as $teacher)
            <div class="teacher-card flex flex-col md:flex-row items-center bg-gradient-to-r from-blue-50 to-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition-all duration-300"
                data-id="{{ $teacher->id }}" 
                data-name="{{ $teacher->name }}" 
                data-middle_name="{{ $teacher->middleName }}" 
                data-last_name="{{ $teacher->lastName }}"
                data-sex="{{ $teacher->sex }}"
                data-birthday="{{ $teacher->birthday }}"
                data-user_type="{{ $teacher->user_type }}"
                data-address="{{ $teacher->address }}"
                data-email="{{ $teacher->email }}"
                data-contact_number="{{ $teacher->contact_number }}"
                data-password="{{ $teacher->password }}"
                data-contactperson="{{ $teacher->contactperson }}"
                data-contactperson_number="{{ $teacher->contactperson_number }}"
                data-id_number="{{ $teacher->id_number }}"
                data-subject="{{ $teacher->subject }}"
                data-department="{{ $teacher->department }}" 
                data-program="{{ $teacher->program }}"
                data-advisory_year="{{ $teacher->advisory_year }}"
                data-advisory_section="{{ $teacher->advisory_section }}">
                <div class="flex-shrink-0">
                    <div class="h-20 w-20 bg-blue-500 text-white flex items-center justify-center rounded-full text-2xl font-bold shadow-md">
                        {{ strtoupper(substr($teacher->name, 0, 1)) }}
                    </div>
                </div>
                <div class="flex-grow md:ml-6 mt-4 md:mt-0">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ $teacher->name }} {{ $teacher->lastName }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-600">
                        <p><strong>Sex:</strong> {{ ucfirst($teacher->sex) }}</p>
                        <p><strong>Birthday:</strong> {{ $teacher->birthday }}</p>
                        <p><strong>Address:</strong> {{ $teacher->address }}</p>
                        <p><strong>Email:</strong> {{ $teacher->email }}</p>
                        <p><strong>Contact:</strong> {{ $teacher->contact_number }}</p>
                        <p><strong>ID Number:</strong> {{ $teacher->id_number }}</p>
                        <p><strong>Department:</strong> {{ $teacher->department }}</p>
                        <p><strong>Advisory Section: </strong>Section {{ $teacher->advisory_section }}</p>
                        <p><strong>Advisory Year: </strong>{{ $teacher->advisory_year }}</p>
                    </div>
                </div>
                <button onclick="openEditModal(this.parentElement)" 
                    class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    Edit
                </button>
            </div>
            @endforeach
        </div>
    </div>
</div>



<!-- Edit Teacher Modal -->
<div id="editTeacherModal" class="fixed inset-0 bottom-0 bg-black bg-opacity-50 hidden z-50">
    <div class="relative flex flex-col items-center justify-center h-screen">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-xl font-semibold mb-4">Edit Teacher Details</h2>
            <form id="editTeacherForm" method="POST" action="{{ route('admin.teacher.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="teacherId">

                <!-- 2-Column Grid for Form Inputs -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <!-- First Name Input -->
                    <div class="mb-4">
                        <label for="editName" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" id="editName" name="name" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <!-- Middle Name Input -->
                    <div class="mb-4">
                        <label for="editMiddleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                        <input type="text" id="editMiddleName" name="middleName" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <!-- Last Name Input -->
                    <div class="mb-4">
                        <label for="editLastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" id="editLastName" name="lastName" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <!-- Sex Input -->
                    <div class="mb-4">
                        <label for="editSex" class="block text-sm font-medium text-gray-700">Sex</label>
                        <select id="editSex" name="sex" class="w-full px-3 py-2 border rounded-lg" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <!-- Birthday Input -->
                    <div class="mb-4">
                        <label for="editBirthday" class="block text-sm font-medium text-gray-700">Birthday</label>
                        <input type="date" id="editBirthday" name="birthday" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <!-- Address Input -->
                    <div class="mb-4">
                        <label for="editAddress" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" id="editAddress" name="address" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <!-- Email Input -->
                    <div class="mb-4">
                        <label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="editEmail" name="email" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <!-- Contact Input -->
                    <div class="mb-4">
                        <label for="editContact" class="block text-sm font-medium text-gray-700">Contact</label>
                        <input type="text" id="editContact" name="contact_number" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <!-- Additional Fields -->
                    <div class="mb-4">
                        <label for="editContactPerson" class="block text-sm font-medium text-gray-700">Contact Person</label>
                        <input type="text" id="editContactPerson" name="contactperson" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="editContactPersonNumber" class="block text-sm font-medium text-gray-700">Contact Person Number</label>
                        <input type="text" id="editContactPersonNumber" name="contactperson_number" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="editIdNumber" class="block text-sm font-medium text-gray-700">ID Number</label>
                        <input type="text" id="editIdNumber" name="id_number" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="editSubject" class="block text-sm font-medium text-gray-700">Subject</label>
                        <input type="text" id="editSubject" name="subject" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="editDepartment" class="block text-sm font-medium text-gray-700">Department</label>
                        <input type="text" id="editDepartment" name="department" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="editProgram" class="block text-sm font-medium text-gray-700">Program</label>
                        <input type="text" id="editProgram" name="program" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="editAdvisoryYear" class="block text-sm font-medium text-gray-700">Advisory Year</label>
                        <input type="text" id="editAdvisoryYear" name="advisory_year" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>

                    <div class="mb-4">
                        <label for="editAdvisorySection" class="block text-sm font-medium text-gray-700">Advisory Section</label>
                        <input type="text" id="editAdvisorySection" name="advisory_section" class="w-full px-3 py-2 border rounded-lg" required>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-400 text-white rounded-lg">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openEditModal(element) {
        const teacher = element.closest('.teacher-card');
        document.getElementById('teacherId').value = teacher.getAttribute('data-id');
        document.getElementById('editName').value = teacher.getAttribute('data-name');
        document.getElementById('editMiddleName').value = teacher.getAttribute('data-middle_name');
        document.getElementById('editLastName').value = teacher.getAttribute('data-last_name');
        document.getElementById('editSex').value = teacher.getAttribute('data-sex');
        document.getElementById('editBirthday').value = teacher.getAttribute('data-birthday');
        document.getElementById('editAddress').value = teacher.getAttribute('data-address');
        document.getElementById('editEmail').value = teacher.getAttribute('data-email');
        document.getElementById('editContact').value = teacher.getAttribute('data-contact_number');
        document.getElementById('editContactPerson').value = teacher.getAttribute('data-contactperson');
        document.getElementById('editContactPersonNumber').value = teacher.getAttribute('data-contactperson_number');
        document.getElementById('editIdNumber').value = teacher.getAttribute('data-id_number');
        document.getElementById('editSubject').value = teacher.getAttribute('data-subject');
        document.getElementById('editDepartment').value = teacher.getAttribute('data-department');
        document.getElementById('editProgram').value = teacher.getAttribute('data-program');
        document.getElementById('editAdvisoryYear').value = teacher.getAttribute('data-advisory_year');
        document.getElementById('editAdvisorySection').value = teacher.getAttribute('data-advisory_section');
        document.getElementById('editTeacherModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('editTeacherModal').classList.add('hidden');
    }
</script>
@endsection
