@extends('layouts.app')

@section('title', 'Admin - Account Management')
@section('content')

<x-brightsparks_header />
<x-admin_sidebar />

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Account Management</h1>

        <!-- Search Bar and Add User Button -->
        <div class="flex justify-between mb-6">
            <!-- Search Bar -->
            <div class="w-1/2">
                <input type="text" placeholder="Search users..." class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <!-- Add User Button -->
            <div class="flex items-center space-x-4">
                <button class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500" data-toggle="modal" data-target="#createUserModal">
                    <i class="fas fa-plus-circle mr-2"></i>Create New Account
                </button>
            </div>
        </div>

        <!-- Filters: Teacher/Student Toggle -->
        <div class="mb-6 flex space-x-4">
            <select class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="all">All Roles</option>
                <option value="teacher">Teachers</option>
                <option value="student">Students</option>
            </select>
            <select class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="all">All Statuses</option>
                <option value="active">Active</option>
                <option value="deactivated">Deactivated</option>
            </select>
        </div>

        <!-- User List Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Name</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Email</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Role</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Status</th>
                        <th class="px-4 py-2 text-center text-sm font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="px-4 py-2 text-sm text-gray-800">John Doe</td>
                        <td class="px-4 py-2 text-sm text-gray-600">johndoe@example.com</td>
                        <td class="px-4 py-2 text-sm text-gray-600">Teacher</td>
                        <td class="px-4 py-2 text-sm">
                            <span class="inline-block px-3 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Active</span>
                        </td>
                        <td class="px-4 py-2 text-center"> 
                            <button class="text-red-500 hover:text-red-600 ml-3" data-toggle="modal" data-target="#deactivateUserModal">
                                <i class="fas fa-ban"></i> Deactivate
                            </button> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

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

<div id="createUserModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Create New Account</h2>
        <form>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select id="role" name="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" class="bg-gray-300 text-black py-2 px-4 rounded-md hover:bg-gray-400 focus:outline-none" data-dismiss="modal">Cancel</button>
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none">Create</button>
            </div>
        </form>
    </div>
</div>


<div id="deactivateUserModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Deactivate User Account</h2>
        <p class="text-lg text-gray-700">Are you sure you want to deactivate this user account?</p>
        <div class="flex justify-end space-x-4 mt-6">
            <button type="button" class="bg-gray-300 text-black py-2 px-4 rounded-md hover:bg-gray-400 focus:outline-none" data-dismiss="modal">Cancel</button>
            <button type="button" class="bg-yellow-600 text-white py-2 px-4 rounded-md hover:bg-yellow-700 focus:outline-none">Deactivate</button>
        </div>
    </div>
</div>


@endsection
