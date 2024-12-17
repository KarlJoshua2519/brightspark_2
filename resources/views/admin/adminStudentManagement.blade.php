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
            <!-- Example Student Card -->
            <div class="student-card flex flex-col md:flex-row items-center bg-gradient-to-r from-blue-50 to-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition-all duration-300" data-grade="Grade 10" data-section="Section A" data-name="John Michael Doe">
                <div class="flex-shrink-0">
                    <div class="h-20 w-20 bg-blue-500 text-white flex items-center justify-center rounded-full text-2xl font-bold shadow-md">
                        J
                    </div>
                </div>
                <div class="flex-grow md:ml-6 mt-4 md:mt-0">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">John Michael Doe</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-600">
                        <p><strong>Sex:</strong> Male</p>
                        <p><strong>Birthday:</strong> June 15, 2005</p>
                        <p><strong>Address:</strong> 123 Street Name, City</p>
                        <p><strong>Email:</strong> johndoe@example.com</p>
                        <p><strong>Contact:</strong> 09123456789</p>
                        <p><strong>Contact Person:</strong> Jane Doe (0987654321)</p>
                        <p><strong>Grade:</strong> Grade 10</p>
                        <p><strong>Section:</strong> Section A</p>
                        <p><strong>LRN:</strong> 1234567890</p>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 md:ml-6 text-center">
                    <a href="#" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg shadow-md font-medium transition">Edit Details</a>
                </div>
            </div>

            <!-- Repeat Student Card Example -->
            <div class="student-card flex flex-col md:flex-row items-center bg-gradient-to-r from-green-50 to-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition-all duration-300" data-grade="Grade 11" data-section="Section B" data-name="Jane Anne Smith">
                <div class="flex-shrink-0">
                    <div class="h-20 w-20 bg-green-500 text-white flex items-center justify-center rounded-full text-2xl font-bold shadow-md">
                        J
                    </div>
                </div>
                <div class="flex-grow md:ml-6 mt-4 md:mt-0">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">Jane Anne Smith</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-600">
                        <p><strong>Sex:</strong> Female</p>
                        <p><strong>Birthday:</strong> February 20, 2006</p>
                        <p><strong>Address:</strong> 456 Another St, City</p>
                        <p><strong>Email:</strong> janesmith@example.com</p>
                        <p><strong>Contact:</strong> 09112233445</p>
                        <p><strong>Contact Person:</strong> John Smith (0977665544)</p>
                        <p><strong>Grade:</strong> Grade 11</p>
                        <p><strong>Section:</strong> Section B</p>
                        <p><strong>LRN:</strong> 0987654321</p>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 md:ml-6 text-center">
                    <a href="#" class="text-white bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg shadow-md font-medium transition">Edit Details</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('searchInput').addEventListener('input', function () {
    filterStudents();
});

document.getElementById('grade').addEventListener('change', function () {
    filterStudents();
});

document.getElementById('section').addEventListener('change', function () {
    filterStudents();
});

function filterStudents() {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const selectedGrade = document.getElementById('grade').value;
    const selectedSection = document.getElementById('section').value;

    document.querySelectorAll('.student-card').forEach(card => {
        const name = card.dataset.name.toLowerCase();
        const grade = card.dataset.grade;
        const section = card.dataset.section;

        // Check if the card matches all filter conditions (search, grade, and section)
        const matchesSearch = name.includes(searchValue);
        const matchesGrade = selectedGrade === '' || grade === selectedGrade;
        const matchesSection = selectedSection === '' || section === selectedSection;

        // Show the card if it matches all conditions, otherwise hide it
        if (matchesSearch && matchesGrade && matchesSection) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

@endsection
