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
            <!-- Example Teacher Card -->
            <div class="teacher-card flex flex-col md:flex-row items-center bg-gradient-to-r from-blue-50 to-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition-all duration-300" data-department="High School" data-section="Section A" data-name="Michael Johnson">
                <div class="flex-shrink-0">
                    <div class="h-20 w-20 bg-blue-500 text-white flex items-center justify-center rounded-full text-2xl font-bold shadow-md">
                        M
                    </div>
                </div>
                <div class="flex-grow md:ml-6 mt-4 md:mt-0">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">Michael Johnson</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-600">
                        <p><strong>Sex:</strong> Male</p>
                        <p><strong>Birthday:</strong> March 10, 1980</p>
                        <p><strong>Address:</strong> 789 Street Name, City</p>
                        <p><strong>Email:</strong> michaeljohnson@example.com</p>
                        <p><strong>Contact:</strong> 09112233445</p>
                        <p><strong>ID Number:</strong> T1234567</p>
                        <p><strong>Department:</strong> High School</p>
                        <p><strong>Advisory Section:</strong> Section A</p>
                    </div>
                </div>
            </div>

            <div class="teacher-card flex flex-col md:flex-row items-center bg-gradient-to-r from-green-50 to-white shadow-lg rounded-lg p-6 hover:shadow-2xl transition-all duration-300" data-department="Elementary" data-section="Section B" data-name="Sarah Lee">
                <div class="flex-shrink-0">
                    <div class="h-20 w-20 bg-green-500 text-white flex items-center justify-center rounded-full text-2xl font-bold shadow-md">
                        S
                    </div>
                </div>
                <div class="flex-grow md:ml-6 mt-4 md:mt-0">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">Sarah Lee</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-600">
                        <p><strong>Sex:</strong> Female</p>
                        <p><strong>Birthday:</strong> July 22, 1985</p>
                        <p><strong>Address:</strong> 123 Another St, City</p>
                        <p><strong>Email:</strong> sarahlee@example.com</p>
                        <p><strong>Contact:</strong> 09176655444</p>
                        <p><strong>ID Number:</strong> T9876543</p>
                        <p><strong>Department:</strong> Elementary</p>
                        <p><strong>Advisory Section:</strong> Section B</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   document.getElementById('searchInput').addEventListener('input', function () {
    filterTeachers();
});

document.getElementById('department').addEventListener('change', function () {
    filterTeachers();
});

document.getElementById('advisory_section').addEventListener('change', function () {
    filterTeachers();
});

function filterTeachers() {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const selectedDepartment = document.getElementById('department').value;
    const selectedSection = document.getElementById('advisory_section').value;

    document.querySelectorAll('.teacher-card').forEach(card => {
        const name = card.dataset.name.toLowerCase();
        const department = card.dataset.department;
        const section = card.dataset.section;

        // Check if the card matches all filter conditions (search, department, and section)
        const matchesSearch = name.includes(searchValue);
        const matchesDepartment = selectedDepartment === '' || department === selectedDepartment;
        const matchesSection = selectedSection === '' || section === selectedSection;

        // Show the card if it matches all conditions, otherwise hide it
        if (matchesSearch && matchesDepartment && matchesSection) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}

</script>

@endsection
