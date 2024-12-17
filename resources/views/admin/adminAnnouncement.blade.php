@extends('layouts.app')

@section('title', 'Admin - Announcements')
@section('content')

<x-brightsparks_header />
<x-admin_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="text-2xl font-semibold text-gray-800">Announcements</h1>

        <div class="mt-6 mb-4">
            <!-- Create Announcement Button -->
            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500" data-toggle="modal" data-target="#createAnnouncementModal">
                Create New Announcement
            </button>
        </div>

        <!-- Announcements List -->
        <div class="space-y-6">
            <!-- Example Static Announcement (you'll dynamically generate this from the backend) -->
            <div class="flex justify-between items-center bg-gray-50 shadow-sm rounded-md p-4">
                <div class="flex flex-col space-y-2">
                    <h2 class="text-xl font-semibold text-gray-800">Announcement Title</h2>
                    <p class="text-sm text-gray-500">Posted on: 2024-12-16</p>
                    <p class="text-gray-700">This is a sample announcement content. It can be updated and deleted.</p>
                </div>
                <div class="flex space-x-3">
                    <button class="text-yellow-500 hover:text-yellow-600" data-toggle="modal" data-target="#editAnnouncementModal">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="text-red-500 hover:text-red-600" data-toggle="modal" data-target="#deleteAnnouncementModal">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </div>
            </div>

            <!-- Add more announcements dynamically here -->
        </div>
    </div>
</div>

<!-- Create Announcement Modal -->
<div id="createAnnouncementModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Create New Announcement</h2>
        <form>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea id="content" name="content" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" class="bg-gray-300 text-black py-2 px-4 rounded-md hover:bg-gray-400 focus:outline-none" data-dismiss="modal">Cancel</button>
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Announcement Modal -->
<div id="editAnnouncementModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Announcement</h2>
        <form>
            <div class="mb-4">
                <label for="edit_title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="edit_title" name="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="edit_content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea id="edit_content" name="content" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" class="bg-gray-300 text-black py-2 px-4 rounded-md hover:bg-gray-400 focus:outline-none" data-dismiss="modal">Cancel</button>
                <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 focus:outline-none">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Announcement Modal -->
<div id="deleteAnnouncementModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Delete Announcement</h2>
        <p class="text-lg text-gray-700">Are you sure you want to delete this announcement?</p>
        <div class="flex justify-end space-x-4 mt-6">
            <button type="button" class="bg-gray-300 text-black py-2 px-4 rounded-md hover:bg-gray-400 focus:outline-none" data-dismiss="modal">Cancel</button>
            <button type="button" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 focus:outline-none">Delete</button>
        </div>
    </div>
</div>


<script>

    const openModalButtons = document.querySelectorAll('[data-toggle="modal"]');
    const closeModalButtons = document.querySelectorAll('[data-dismiss="modal"]');
    const modals = document.querySelectorAll('.modal');
    openModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetModalId = button.getAttribute('data-target');
            const targetModal = document.querySelector(targetModalId);
            targetModal.classList.remove('hidden');
        });
    });

    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetModal = button.closest('.modal');
            targetModal.classList.add('hidden');
        });
    });

    modals.forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });
</script>

@endsection
