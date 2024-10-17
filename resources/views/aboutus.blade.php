@extends('layouts.app')

@section('title', 'About Us')
@section('content')

<x-navbar />

    <div class="p-10">
        <!-- Main Container -->
        <div class="p-6 mt-14 bg-white shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
            <h1 class="text-4xl font-bold text-center text-blue-900 mb-8">About Brightsparks Multiple Intelligence School</h1>

            <!-- Mission Statement Section -->
            <section class="mb-12 bg-blue-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-blue-800 mb-4">Our Mission</h2>
                <p class="text-gray-700">
                    At Brightsparks, our mission is to empower students through a holistic educational approach that nurtures their unique intelligences and character.
                </p>
            </section>

            <!-- School Overview Section -->
            <section class="mb-12">
                <h2 class="text-2xl font-semibold text-blue-800 mb-4">Our Story</h2>
                <p class="text-gray-700 mb-4">
                    The Brightsparks Multiple Intelligence School was established in 2016 as a small learning center located in Victory Church, Malolos, Bulacan. Currently, we have one branch with 400 enrolled students, offering education from preschool to grade 10.
                </p>
                <p class="text-gray-700 mb-4">
                    As a Christian character-based institution, we emphasize three core values: Leadership, Academic Excellence, and Christian Character.
                </p>
                <p class="text-gray-700 mb-4">
                    We utilize the Moodle platform for our learning management system and employ the Scholastic Learning Zone virtual library as a supplementary resource. Additionally, we use Google Suite for administrative tasks and maintain an active Facebook page for school activities and announcements.
                </p>
            </section>

            <!-- Timeline Section -->
            <section class="mb-12">
                <h2 class="text-2xl font-semibold text-blue-800 mb-4">Timeline of Our Growth</h2>
                <div class="relative">
                    <div class="absolute border-l-2 border-blue-300 h-full top-0 left-5"></div>
                    <div class="space-y-4">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center">1</div>
                            <div class="ml-4">
                                <h3 class="font-semibold text-blue-800">2016</h3>
                                <p class="text-gray-700">Established as a small learning center in Victory Church.</p>
                            </div>
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center">2</div>
                            <div class="ml-4">
                                <h3 class="font-semibold text-blue-800">2018</h3>
                                <p class="text-gray-700">Grew to 200 enrolled students, expanding our programs.</p>
                            </div>
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center">3</div>
                            <div class="ml-4">
                                <h3 class="font-semibold text-blue-800">2020</h3>
                                <p class="text-gray-700">Launched our online learning platform with Moodle.</p>
                            </div>
                        </div>
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center">4</div>
                            <div class="ml-4">
                                <h3 class="font-semibold text-blue-800">2023</h3>
                                <p class="text-gray-700">Introduced the Scholastic Learning Zone virtual library.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Objectives Section -->
            <section class="mb-12 bg-blue-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-blue-800 mb-4">Objectives of the Study</h2>
                <p class="text-gray-700 mb-4">
                    The main objective of the Web-based School Management System for Brightsparks Multiple Intelligence School, Inc. is to centralize school operations and improve the school’s image.
                </p>
                <h3 class="text-xl font-semibold text-blue-800 mb-2">General Objective</h3>
                <p class="text-gray-700">
                    Our goal is to develop a comprehensive website that will assist teachers in organizing their classes, allow the administration to post and edit announcements, and enable students to easily access their virtual report cards through a dedicated student portal.
                </p>
            </section>

            <!-- Additional Features Section -->
            <section class="mb-12">
                <h2 class="text-2xl font-semibold text-blue-800 mb-4">Why Choose Us?</h2>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Personalized Learning: We focus on individual learning styles and strengths.</li>
                    <li>Community Engagement: We encourage parents and the community to actively participate in school events.</li>
                    <li>Comprehensive Curriculum: Our curriculum is designed to foster academic excellence and character development.</li>
                    <li>Innovative Learning Tools: Utilizing technology to enhance the learning experience.</li>
                </ul>
            </section>

            <!-- Contact Information Section -->
            <section class="mt-12 bg-blue-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-blue-800 mb-4">Get in Touch</h2>
                <p class="text-gray-700">
                    If you have any questions or would like more information about Brightsparks Multiple Intelligence School, please feel free to contact us.
                </p>
                <p class="text-gray-700">
                    Email: <a href="mailto:info@brightsparks.edu.ph" class="text-blue-600 underline">info@brightsparks.edu.ph</a> | Phone: (123) 456-7890
                </p>
            </section>
        </div>
    </div>

@endsection
