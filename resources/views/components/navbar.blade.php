
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
                      class="block py-2 pl-3 pr-4 text-gray-100 rounded  md:hover:text-yellow-300   {{ Request::is('/announcement') ? ' border-b-2 border-yellow-300' : '' }}">Announcements</a>
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