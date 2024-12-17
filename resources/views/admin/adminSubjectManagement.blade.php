@extends('layouts.app')

@section('title', 'Admin - Subject Management')
@section('content')

<x-brightsparks_header />
<x-admin_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

        <!-- Page Title -->
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Subject Management</h1>

        <!-- Add Subject Button -->
        <div class="mb-6 text-right">
            <button id="addSubjectButton" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">Add Subject</button>
        </div>

        <!-- Subject Cards List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Subject Card Example -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="bg-gray-200 p-4 text-center">
                    <h2 class="text-xl font-semibold text-gray-800">Mathematics</h2>
                    <p class="mt-2 text-sm text-gray-600">Grade 10</p>
                </div>
                <div class="p-4">
                    <p><strong>Teacher:</strong> John Doe</p>
                    <p><strong>Code:</strong> MATH101</p>
                    <div class="mt-4 flex justify-between">
                        <button class="text-yellow-600 hover:text-yellow-700 flex items-center space-x-2" onclick="editSubject(1)">
                            <i class="fas fa-edit"></i><span>Edit</span>
                        </button>
                        <button class="text-red-600 hover:text-red-700 flex items-center space-x-2" onclick="deleteSubject(1)">
                            <i class="fas fa-trash-alt"></i><span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Another Subject Card Example -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="bg-gray-200 p-4 text-center">
                    <h2 class="text-xl font-semibold text-gray-800">English</h2>
                    <p class="mt-2 text-sm text-gray-600">Grade 11</p>
                </div>
                <div class="p-4">
                    <p><strong>Teacher:</strong> Jane Smith</p>
                    <p><strong>Code:</strong> ENG102</p>
                    <div class="mt-4 flex justify-between">
                        <button class="text-yellow-600 hover:text-yellow-700 flex items-center space-x-2" onclick="editSubject(2)">
                            <i class="fas fa-edit"></i><span>Edit</span>
                        </button>
                        <button class="text-red-600 hover:text-red-700 flex items-center space-x-2" onclick="deleteSubject(2)">
                            <i class="fas fa-trash-alt"></i><span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Adding or Editing Subject -->
<div id="subjectModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Add / Edit Subject</h2>
        
        <form id="subjectForm">
            <div class="mb-4">
                <label for="subjectName" class="block text-gray-700">Subject Name</label>
                <input type="text" id="subjectName" name="subjectName" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <div class="mb-4">
                <label for="subjectTeacher" class="block text-gray-700">Assign Teacher</label>
                <input type="text" id="subjectTeacher" name="subjectTeacher" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <div class="mb-4">
                <label for="subjectCode" class="block text-gray-700">Subject Code</label>
                <input type="text" id="subjectCode" name="subjectCode" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <div class="mb-4">
                <label for="subjectGrade" class="block text-gray-700">Grade Level</label>
                <select id="subjectGrade" name="subjectGrade" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="Grade 10">Grade 10</option>
                    <option value="Grade 11">Grade 11</option>
                    <option value="Grade 12">Grade 12</option>
                </select>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="button" id="closeModalButton" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">Cancel</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
// Open modal for Add Subject
document.getElementById('addSubjectButton').addEventListener('click', function() {
    document.getElementById('subjectModal').classList.remove('hidden');
    document.getElementById('subjectForm').reset();
});


document.getElementById('closeModalButton').addEventListener('click', function() {
    document.getElementById('subjectModal').classList.add('hidden');
});


document.getElementById('subjectForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const subjectName = document.getElementById('subjectName').value;
    const subjectTeacher = document.getElementById('subjectTeacher').value;
    const subjectCode = document.getElementById('subjectCode').value;
    const subjectGrade = document.getElementById('subjectGrade').value;
    console.log('Subject Name:', subjectName);
    console.log('Teacher:', subjectTeacher);
    console.log('Subject Code:', subjectCode);
    console.log('Grade Level:', subjectGrade);
    document.getElementById('subjectModal').classList.add('hidden');
    

    alert('Subject added/updated successfully!');
});


function editSubject(subjectId) {

    const subjectData = subjectId === 1 ? { name: 'Mathematics', teacher: 'John Doe', code: 'MATH101', grade: 'Grade 10' } : { name: 'English', teacher: 'Jane Smith', code: 'ENG102', grade: 'Grade 11' };

    document.getElementById('subjectName').value = subjectData.name;
    document.getElementById('subjectTeacher').value = subjectData.teacher;
    document.getElementById('subjectCode').value = subjectData.code;
    document.getElementById('subjectGrade').value = subjectData.grade;
    document.getElementById('subjectModal').classList.remove('hidden');
}

function deleteSubject(subjectId) {
    const confirmed = confirm('Are you sure you want to delete this subject?');
    if (confirmed) {
        console.log('Subject deleted:', subjectId);
        alert('Subject deleted successfully!');
    }
}
</script>

@endsection
