@extends('layouts.app')

@section('title', 'Teacher Registration')
@section('content')
    <x-navbar />

    <div class="mt-4 pt-8">
        <div class="min-h-screen min-w-full flex items-center justify-center bg-gray-100 p-2">
            <div class="bg-white p-8 ">
                <h2 class="text-2xl font-bold mb-6 text-center text-yellow-400">{{ __('Teacher Registration') }}</h2>

                <div class="card-body">
                    <form method="POST" action="/teacher/registered">
                        @csrf
                        <h2 class="font-bold text-blue-700 text-xl"><i class="fa-solid fa-face-smile text-blue-300"></i>
                            PERSONAL DETAILS </h2>
                        <hr>

                        <div class="flex flex-row space-x-4 mt-2">
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
                                <select id="sex" class="bg-gray-200 p-2 rounded-md" style="width: 12.5rem;"
                                    name="sex" required>
                                    <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <!-- Birthday -->
                            <div>
                                <label for="birthday" class="block text-gray-500">Birthday</label>
                                <input id="birthday" type="date" class="bg-gray-200 p-2 rounded-md"
                                    style="width: 12rem;" name="birthday" value="{{ old('birthday') }}" required>
                            </div>

                            <!-- Contact Number -->
                            <div>
                                <label for="contact_number" class="block text-gray-500">Contact Number</label>
                                <input id="contact_number" type="text" class="bg-gray-200 p-2 rounded-md"
                                    name="contact_number" value="{{ old('contact_number') }}" required>
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
                            <div class="w-1/2 mb-4">
                                <label for="contactperson_number" class="block text-gray-500">Contact Person Number</label>
                                <input id="contactperson_number" type="number" class="bg-gray-200 p-2 rounded-md w-full"
                                    name="contactperson_number" value="{{ old('contactperson_number') }}" required>
                            </div>



                        </div>

                        <h2 class="font-bold text-blue-700 text-xl"><i class="fa-solid fa-graduation-cap text-blue-300"></i>
                            TEACHER INFORMATION </h2>
                        <hr>

                        <div class="flex flex-row space-x-4 w-full mt-2">
                            <div class="w-1/2">
                                <label for="id_number" class="block text-gray-500">{{ __('ID Number') }}</label>
                                <input id="id_number" type="text" class="bg-gray-200 p-2 rounded-md w-full"
                                    name="id_number" value="{{ old('id_number') }}" required>
                            </div>

                            <div class="w-1/2">
                                <label for="department" class="block text-gray-500">{{ __('Department') }}</label>
                                <input id="department" type="text" class="bg-gray-200 p-2 rounded-md w-full"
                                    name="department" value="{{ old('department') }}" required>
                            </div>

                        </div>

                        <div class="flex flex-row space-x-4 w-full mt-2">

                            <div class="w-1/2">
                                <label for="advisory_year" class="block text-gray-500">{{ __('Advisory Year') }}</label>
                                <input id="advisory_year" type="number" class="bg-gray-200 p-2 rounded-md w-full"
                                    name="advisory_year" value="{{ old('advisory_year') }}" required>
                            </div>

                            <div class="w-1/2">
                                <label for="advisory_section"
                                    class="block text-gray-500">{{ __('Advisory Section') }}</label>
                                {{-- <input id="advisory_section" type="text" class="bg-gray-200 p-2 rounded-md w-full"
                                    name="advisory_section" value="{{ old('advisory_section') }}" required> --}}

                                    <select id="advisory_section" class="bg-gray-200 p-2 rounded-md w-full" name="advisory_section"
                                    required>
                                    <option value="" ></option>
                                    <option value="1" {{ old('advisory_section') == '1' ? 'selected' : '' }}>Section 1
                                    </option>
                                    <option value="2" {{ old('advisory_section') == '2' ? 'selected' : '' }}>
                                        Section 2</option>

                                </select>
                            </div>


                        </div>

                        <div class="flex flex-row space-x-4 w-full mt-2">
                            <div class="w-1/2">

                                <div class="form-group">
                                    <label class="block text-gray-500">{{ __('Subject') }}</label>
                                    <div class="input-group flex space-x-2 items-center">
                                        <input type="text" class="bg-gray-200 p-2 rounded-md w-full" name="subject[]"
                                            placeholder="Enter a subject" required>
                                        <div class="input-group-append">
                                            <button type="button" class="bg-gray-200 px-3 py-3 rounded-md"
                                                id="add-subject"><i class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div id="subject-fields"></div>
                                </div>

                            </div>

                            <div class="w-1/2">

                                <div class="form-group">
                                    <label for="program" class="block text-gray-500">{{ __('Program') }}</label>
                                    <select id="program" class="bg-gray-200 p-2 rounded-md w-full" name="program"
                                        required>
                                        <option value="" ></option>
                                        <option value="kinder" {{ old('program') == 'kinder' ? 'selected' : '' }}>Kinder
                                        </option>
                                        <option value="elementary" {{ old('program') == 'elementary' ? 'selected' : '' }}>
                                            Elementary</option>

                                    </select>
                                </div>


                            </div>

                        </div>

                        <h2 class="font-bold text-blue-700 text-xl mt-2"><i class="fa-solid fa-at text-blue-300"></i>
                            ACCOUNT
                            INFORMATION </h2>
                        <hr>


                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-gray-500">Email</label>
                            <input id="email" type="email" class="bg-gray-200 p-2 rounded-md w-full"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-row space-x-4 w-full">

                            <!-- Password -->
                            <div class="w-1/2">
                                <label for="password" class="block text-gray-500">Password</label>
                                <input id="password" type="password" class="bg-gray-200 p-2 rounded-md w-full"
                                    name="password" required autocomplete="new-password">
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="w-1/2 mb-4">
                                <label for="password-confirm" class="block text-gray-500">Confirm Password</label>
                                <input id="password-confirm" type="password" class="bg-gray-200 p-2 rounded-md w-full"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>


                        </div>


                        <div class="mt-2 flex justify-center">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
    
    <script>
        var maxSubjects = 4; // Maximum number of subjects allowed
        var subjectFields = document.getElementById('subject-fields');

        // Add Subject button click event
        document.getElementById('add-subject').addEventListener('click', function() {
            if (subjectFields.children.length < maxSubjects) {
                var inputGroup = document.createElement('div');
                inputGroup.className = 'input-group mt-2 flex space-x-2 items-center';
                inputGroup.innerHTML = `
                <input type="text" class="bg-gray-200 p-2 rounded-md w-full" name="subject[]" placeholder="Enter a subject" required>
                <div class="input-group-append">
                   
                    <button type="button" class="bg-gray-200 px-3 py-3 rounded-md remove-subject" id="add-subject"><i class="fa-solid fa-minus"></i></button>
                </div>
            `;
                subjectFields.appendChild(inputGroup);

                // Remove Subject button click event
                inputGroup.querySelector('.remove-subject').addEventListener('click', function() {
                    subjectFields.removeChild(inputGroup);
                });
            } else {
                alert('You can add a maximum of ' + maxSubjects + ' subject.');
            }
        });
    </script>
    @endsection





  
