@extends('layouts.app')

@section('title', 'Admin - Inbox')
@section('content')

<x-brightsparks_header />
<x-admin_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Admin Inbox</h1>

        <!-- Search Bar -->
        <div class="mb-6">
            <input type="text" placeholder="Search messages..." class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <!-- Bulk Actions -->
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center space-x-4">
                <input type="checkbox" id="select-all" class="text-blue-500 rounded-md" />
                <label for="select-all" class="text-gray-600">Select All</label>
                <button class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700" id="deleteSelected">Delete</button>
                <button class="px-6 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600" id="markReadSelected">Mark as Read</button>
            </div>
            <div class="mb-2">
                <button class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500" data-toggle="modal" data-target="#createMessageModal">
                    <i class="fas fa-plus-circle mr-2"></i>Create New Message
                </button>
            </div>
        </div>

        <!-- Messages List -->
        <div class="space-y-4">
            <!-- Example Static Message -->
            <div class="bg-white shadow-md rounded-lg p-4 flex items-center space-x-4">
                <input type="checkbox" class="message-checkbox text-blue-500 rounded-md" />
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Subject: Important Update</h2>
                        <p class="text-sm text-gray-500">Date: 2024-12-16</p>
                    </div>
                    <p class="text-gray-600 mt-2">From: Admin - This is a sample message content. Important information regarding the school portal. Please read carefully!</p>
                </div>
            </div>

            <!-- More messages would be dynamically added here, and each message has the same structure -->
            <!-- Repeat similar structure for multiple messages -->
        </div>

        <!-- Pagination (if necessary) -->
        <div class="flex justify-center mt-6">
            <nav>
                <ul class="flex space-x-2">
                    <li>
                        <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-md hover:bg-gray-300">1</button>
                    </li>
                    <li>
                        <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-md hover:bg-gray-300">2</button>
                    </li>
                    <li>
                        <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-md hover:bg-gray-300">3</button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Create Message Modal -->
<div id="createMessageModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Create New Message</h2>
        <form>
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                <input type="text" id="subject" name="subject" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
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

@endsection
