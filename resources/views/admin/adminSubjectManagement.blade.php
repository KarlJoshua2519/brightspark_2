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
            @foreach($subjects as $subject)
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-all duration-300">
                    <div class="bg-gray-200 p-4 text-center">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $subject->name }}</h2>
                        <p class="mt-2 text-sm text-gray-600">{{ $subject->grade }}</p>
                    </div>
                    <div class="p-4">
                        <p><strong>Teacher:</strong> {{ $subject->teacher }}</p>
                        <p><strong>Code:</strong> {{ $subject->code }}</p>
                        <div class="mt-4 flex justify-between">
                            <button class="text-yellow-600 hover:text-yellow-700 flex items-center space-x-2" onclick="editSubject({{ $subject->id }})">
                                <i class="fas fa-edit"></i><span>Edit</span>
                            </button>
                            <button class="text-red-600 hover:text-red-700 flex items-center space-x-2" onclick="deleteSubject({{ $subject->id }})">
                                <i class="fas fa-trash-alt"></i><span>Delete</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal for Adding or Editing Subject -->
<div id="subjectModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex flex-col w-full hidden justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Add / Edit Subject</h2>
        
        <form action="{{ route('admin.subjects.store') }}" method="POST" id="subjectForm">
             @csrf
            <div class="mb-4">
                <label for="subjectName" class="block text-gray-700">Subject Name</label>
                <input type="text" id="subjectName" name="subjectName" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <div class="mb-4">
                <label for="subjectTeacherName" class="block text-gray-700">Assign Teacher</label>
                <input type="text" id="subjectTeacherName" name="subjectTeacherName" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <div class="mb-4">
                <label for="subjectTeacherEmail" class="block text-gray-700">Email Teacher</label>
                <input type="text" id="subjectTeacherEmail" name="subjectTeacherEmail" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <div class="mb-4">
                <label for="subjectCode" class="block text-gray-700">Subject Code</label>
                <input type="text" id="subjectCode" name="subjectCode" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <div class="mb-4">
                <label for="subjectGrade" class="block text-gray-700">Grade Level</label>
                <select id="subjectGrade" name="subjectGrade" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="Grade 1">Grade 1</option>
                    <option value="Grade 2">Grade 2</option>
                    <option value="Grade 3">Grade 3</option>
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

// Delete subject
function deleteSubject(id) {
    if (confirm('Are you sure you want to delete this subject?')) {
        fetch(`/admin/subjects/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(response => {
            if (response.ok) {
                alert('Subject deleted successfully!');
                location.reload(); // Refresh to remove the deleted subject from the list
            } else {
                alert('Error deleting subject.');
            }
        });
    }
}
document.getElementById('subjectForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    const subjectName = document.getElementById('subjectName').value;
    const teacherEmail = document.getElementById('subjectTeacherEmail').value;
    const subjectCode = document.getElementById('subjectCode').value;
    const subjectGrade = document.getElementById('subjectGrade').value;

    if (!subjectName || !teacherEmail || !subjectCode || !subjectGrade) {
        alert('All fields are required.');
        return;
    }

    try {
        const response = await fetch('{{ route('admin.subjects.store') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                subjectName: subjectName,
                subjectTeacherEmail: teacherEmail,
                subjectCode: subjectCode,
                subjectGrade: subjectGrade
            })
        });

        const result = await response.json();
        console.log(response);  // Log response for debugging
        console.log(result);  // Log result for debugging

        if (response.ok) {
            alert(result.success);
            location.reload(); // Refresh to show the new subject
        } else {
            alert('Error: ' + (result.message || result.error || 'Something went wrong.'));
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to add or assign subject.');
    }
});


</script>

@endsection
