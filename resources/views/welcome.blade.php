<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BrightSparks</title>
    <link rel="icon" href="{{ asset('images/brightsparkslogo.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://kit.fontawesome.com/57a798c9bb.js" crossorigin="anonymous"></script>

</head>

<body class="bg-gray-100">

    <nav class=" fixed top-0 left-0 right-0 z-[1000] bg-blue-900 border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('welcome') }}" class="flex items-center space-x-2">
                <img src="{{ asset('images/brightsparkslogo.png') }}" class="w-8 h-58">
                <span class="text-md font-bold whitespace-nowrap text-yellow-300 hover:text-yellow-400">BRIGHTSPARKS
                    MULTIPLE INTELLIGENCE SCHOOL INC.</span>
            </a>
            <button data-collapse-toggle="navbar-dropdown" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4  md:flex-row md:space-x-8 md:mt-0 md:border-0  ">
                    <li>
                        <a href="{{ route('welcome') }}"
                            class="block py-2 pl-3 pr-4 text-white     {{ Request::is('/') ? ' border-b-2 border-yellow-300' : '' }}"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="announcements"
                            class="block py-2 pl-3 pr-4 text-gray-100 rounded  md:hover:text-yellow-300   {{ Request::is('/announcements') ? ' border-b-2 border-yellow-300' : '' }}">Announcements</a>
                    </li>
                    <li>
                        <a href="about"
                            class="block py-2 pl-3 pr-4 text-gray-100 rounded  md:hover:text-yellow-300   {{ Request::is('about') ? ' border-b-2 border-yellow-300' : '' }}">About
                            Us</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-100 rounded  md:hover:text-yellow-300   {{ Request::is('/contactu') ? ' border-b-2 border-yellow-300' : '' }}">Contact Us</a>
                    </li>
                    @if (!in_array(request()->path(), ['teacher.login.view', 'student.login.view']))
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                class="font-semibold flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-100 hover:text-yellow-300 md:w-auto ">Login
                                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar"
                                class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                    aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="/teacher/login" class="block px-4 py-2 hover:bg-gray-100 "> <i
                                                class="fa-solid fa-chalkboard-user px-2 "></i> Teacher</a>
                                    </li>
                                    <li class="flex hover:bg-gray-100 ">
                                        <img src="{{ asset('images/student.png') }}" class="ml-6 mt-2 w-5 h-5">
                                        <a href="/student/login" class="block px-2 py-2 ">Student</a>
                                    </li>
                    @endif
                </ul>

            </div>
            </li>



            </ul>
        </div>
        </div>
    </nav>

<div class="mt-10 pt-8">
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-82 overflow-hidden md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/b5.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://scontent.fmnl8-3.fna.fbcdn.net/v/t1.6435-9/79862515_2838399732847662_259083113173352448_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=0bb214&_nc_eui2=AeHqYny-pediJ2-xhisV6EVIB4PWBdL5tGQHg9YF0vm0ZED5DWXt78jJ6BLezWO-Ou3-yv-4ZBLmoLdLPjqtCU4C&_nc_ohc=CHxRQO_NW00AX9FbWtR&_nc_ht=scontent.fmnl8-3.fna&oh=00_AfAQy0nMfBDci9wQKiGLu3AUb8rlBYrcPxM2PiKkGN_EAQ&oe=65485DBE"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/sample3.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/sample4.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/sample5.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</div>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-blue-900 uppercase  text-5xl" href="#">
                Announcements and Advisories
            </a>
        </div>
    </header>




    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="{{ asset('images/b1.jpg') }}">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Hiring</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">Pre School Teacher</a>
                    <p href="#" class="text-sm pb-3">

                        October 25, 2023
                    </p>
                    <a href="#" class="pb-6">We are looking for a Preschool Major who has a heart for children and can facilitate meaningful learning experiences among preschoolers. 
                        Kindly email us your updated resume at admin@brightsparksph.com or visit us at the 
                        Victory Bulacan Complex, 8004 Sumapang Matanda, McArthur Highway, City of Malolos, Bulacan. 
                        Thank you, and we look forward to working with you!</a>
                    <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i
                            class="fas fa-arrow-right"></i></a>
                </div>
            </article>

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="{{ asset('images/b2.jpg') }}">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Announcement</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">STUDENTS ORIENTATION</a>
                    <p href="#" class="text-sm pb-3">
                        October 20, 2023
                    </p>
                    <a href="#" class="pb-6">Kindly take note of the following reminders:

                        1. Please follow your regular class schedule.
                        2. Wear your complete school uniform.
                        3. Bring your school materials for inspection.
                        4. Bring your own food and snacks (as our cafeteria is not yet open)
                        
                        NOTE:
                        To all Online Students: As previously emailed by the admin, you have a separate online orientation tomorrow. Please check the prior email.
                        
                        To all Homeschoolers: Your Student Orientation will be during your first Campus Day on Friday.</a>
                    <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i
                            class="fas fa-arrow-right"></i></a>
                </div>
            </article>

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="{{ asset('images/b4.jpg') }}">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Announcement</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">Opening of Classes</a>
                    <p href="#" class="text-sm pb-3">
                        October 19, 2023
                    </p>
                    <a href="#" class="pb-6">We are excited for the opening of classes for the School Year 2023-2024! In line with this, kindly take note of our schedule next week:

                        AUGUST 14<br>
                        10:00-12:00 General Parents' Orientation (for both regular and homeschool parents)<br>
                        1:00-3:00 Homeschool Parents' Training and Orientation
                        </a>
                    <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i
                            class="fas fa-arrow-right"></i></a>
                </div>
            </article>

            <!-- Pagination -->
            <div class="flex items-center py-8">
                <a href="#"
                    class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">1</a>
                <a href="#"
                    class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center">2</a>
                <a href="#"
                    class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Next
                    <i class="fas fa-arrow-right ml-2"></i></a>
            </div>

        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">About Us</p>
                <p class="pb-2">Brightsparks Multiple Intelligence School, Inc. is an educational institution that
                    puts emphasis on Christian character and leadership alongside academic excellence; ultimately
                    training the next generation to love God and love others. Brightsparks Multiple Intelligence School,
                    Inc. exists to teach Biblical reasoning, application, and self-governance by putting the Word of God
                    at the heart of every subject.</p>
                <a href="#"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Get to know us
                </a>
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Media Gallery</p>
                <div class="grid grid-cols-3 gap-3">
                    <img class="hover:opacity-75" src="{{ asset('images/b1.jpg') }}">
                    <img class="hover:opacity-75" src="{{ asset('images/b2.jpg') }}">
                    <img class="hover:opacity-75" src="{{ asset('images/b3.jpg') }}">
                    <img class="hover:opacity-75" src="{{ asset('images/b4.jpg') }}">
                    <img class="hover:opacity-75" src="{{ asset('images/b1.jpg') }}">
                    <img class="hover:opacity-75" src="{{ asset('images/b2.jpg') }}">
                    <img class="hover:opacity-75" src="{{ asset('images/b3.jpg') }}">
                    <img class="hover:opacity-75" src="{{ asset('images/b1.jpg') }}">
                    <img class="hover:opacity-75" src="{{ asset('images/b3.jpg') }}">
                </div>
                <a href="https://facebook.com/BrightSparksPH/?_rdc=1&_rdr" target="_blank"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i> Follow @BrightSparks
                </a>
            </div>

        </aside>

        <div class="w-full">
            <x-footer />
        </div>



</body>


</html>
