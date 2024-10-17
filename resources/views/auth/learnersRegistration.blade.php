@extends('layouts.app')

@section('title', 'Student Registration')
@section('content')
    <x-navbar />
    <div class="mb-4 pt-4 mt-4"><
    <div class="min-h-screen min-w-full flex items-center justify-center bg-gray-100 p-2">
        <div class="bg-white p-8 ">
            <h2 class="text-2xl font-bold mb-6 text-center text-yellow-400">{{ __('Student Registration') }}</h2>

            <form method="POST" action="/student/registered" class="space-y-4">
                @csrf
                <h2 class="font-bold text-blue-700 text-xl"><i class="fa-solid fa-face-smile text-blue-300"></i> PERSONAL DETAILS </h2>
                <hr>
                <div class="flex flex-row space-x-4">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-gray-500">Name</label>
                        <input id="name" type="text" class="bg-gray-200 p-2 rounded-md" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Middle Name -->
                    <div>
                        <label for="middleName" class="block text-gray-500">Middle Name</label>
                        <input id="middleName" type="text" class="bg-gray-200 p-2 rounded-md" name="middleName"
                            value="{{ old('middleName') }}" autocomplete="middleName">
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label for="lastName" class="block text-gray-500">Last Name</label>
                        <input id="lastName" type="text" class="bg-gray-200 p-2 rounded-md" name="lastName"
                            value="{{ old('lastName') }}" required autocomplete="lastName">
                        @error('lastName')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="flex flex-row space-x-4">
                    <!-- Sex -->
                    <div>
                        <label for="sex" class="block text-gray-500">Sex</label>
                        <select id="sex" class="bg-gray-200 p-2 rounded-md" style="width: 12.5rem;" name="sex"
                            required>
                            <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <!-- Birthday -->
                    <div>
                        <label for="birthday" class="block text-gray-500">Birthday</label>
                        <input id="birthday" type="date" class="bg-gray-200 p-2 rounded-md" style="width: 12rem;"
                            name="birthday" value="{{ old('birthday') }}" required>
                    </div>

                    <!-- Contact Number -->
                    <div>
                        <label for="contact_number" class="block text-gray-500">Contact Number</label>
                        <input id="contact_number" type="text" class="bg-gray-200 p-2 rounded-md" name="contact_number"
                            value="{{ old('contact_number') }}" required>
                        @error('contact_number')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>




                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-gray-500">Address</label>
                    <input id="address" type="text" class="bg-gray-200 p-2 rounded-md w-full" name="address"
                        value="{{ old('address') }}" required>
                </div>

                <div class="flex flex-row space-x-4 w-full">

                    <!-- Contact Person -->
                    <div class="w-1/2">
                        <label for="contactperson" class="block text-gray-500">Contact Person</label>
                        <input id="contactperson" type="text" class="bg-gray-200 p-2 rounded-md w-full"
                            name="contactperson" value="{{ old('contactperson') }}" required>
                    </div>

                    <!-- Contact Person Number -->
                    <div class="w-1/2">
                        <label for="contactperson_number" class="block text-gray-500">Contact Person Number</label>
                        <input id="contactperson_number" type="text" class="bg-gray-200 p-2 rounded-md w-full"
                            name="contactperson_number" value="{{ old('contactperson_number') }}" required>
                    </div>



                </div>

                <h2 class="font-bold text-blue-700 text-xl"><i class="fa-solid fa-graduation-cap text-blue-300"></i> STUDENT INFORMATION </h2>
                <hr>

                <div class="flex flex-row space-x-4 w-full">

                    <!-- Grade -->
                    <div class="w-1/2">
                        <label for="grade" class="block text-gray-500">Grade</label>
                        <input id="grade" type="text" class="bg-gray-200 p-2 rounded-md w-full" name="grade"
                            value="{{ old('grade') }}" required>
                    </div>

                    <!-- Section -->
                    <div class="w-1/2">
                        <label for="section"
                            class="block text-gray-500">{{ __('Section') }}</label>
                        {{-- <input id="advisory_section" type="text" class="bg-gray-200 p-2 rounded-md w-full"
                            name="advisory_section" value="{{ old('advisory_section') }}" required> --}}

                            <select id="section" class="bg-gray-200 p-2 rounded-md w-full" name="section"
                            required>
                            <option value="" ></option>
                            <option value="1" {{ old('section') == '1' ? 'selected' : '' }}>Section 1
                            </option>
                            <option value="2" {{ old('section') == '2' ? 'selected' : '' }}>
                                Section 2</option>

                        </select>
                    </div>

                </div>

                <!-- LRN -->
                <div>
                    <label for="lrn" class="block text-gray-500">LRN (Learner's Reference Number)</label>
                    <input id="lrn" type="text" class="bg-gray-200 p-2 rounded-md w-full" name="lrn"
                        value="{{ old('lrn') }}" required>
                </div>


                <h2 class="font-bold text-blue-700 text-xl"><i class="fa-solid fa-at text-blue-300"></i> ACCOUNT INFORMATION </h2>
                <hr>


                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-500">Email</label>
                    <input id="email" type="email" class="bg-gray-200 p-2 rounded-md w-full" name="email"
                        value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-row space-x-4 w-full">

                    <!-- Password -->
                    <div class="w-1/2">
                        <label for="password" class="block text-gray-500">Password</label>
                        <input id="password" type="password" class="bg-gray-200 p-2 rounded-md w-full" name="password" required
                            autocomplete="new-password">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="w-1/2 mb-4">
                        <label for="password-confirm" class="block text-gray-500">Confirm Password</label>
                        <input id="password-confirm" type="password" class="bg-gray-200 p-2 rounded-md w-full" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>


                </div>


                <div class="mt-6 flex justify-center">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<x-footer />
@endsection



