<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <title>Attendance System</title>
</head>

<body>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <a href="/" class="flex ml-2 md:mr-24">
                        <svg class="w-8 h-8 flex-shrink-0 w-6 h-6 text-sky-500 transition duration-75 mr-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path>
                        </svg>
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Attendify</span>
                    </a>
                </div>
                <div class="w-full flex items-center justify-between px-3">
                    <form>
                        <label for="search" class="text-sm font-medium text-gray-900 sr-only">Search</label>
                        <div class="relative w-80">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="search" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6 px-4 pl-10" placeholder="Search...">
                            <!-- <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Search</button> -->
                        </div>
                    </form>
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                            <span class="ml-3">{{auth()->user()->firstName}}</span>
                            <button type="button" class="flex text-sm text-black ml-2" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    Neil Sims
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    neil.sims@flowbite.com
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-sky-100 hover:text-sky-500 dark:hover:bg-sky-700 group {{ request()->is('/') ? 'bg-sky-100 text-sky-500' : ''}}">
                        <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-500 dark:group-hover:text-white {{ request()->is('/') ? 'text-sky-500' : ''}}" fill="none" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                @unless(auth()->user()->role != "admin")
                <li x-data="{ open: false }">
                    <div x-on:click="open = ! open" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-sky-100 hover:text-sky-500 dark:hover:bg-sky-700 group">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-500 dark:group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.05 2.53001L4.03002 6.46001C2.10002 7.72001 2.10002 10.54 4.03002 11.8L10.05 15.73C11.13 16.44 12.91 16.44 13.99 15.73L19.98 11.8C21.9 10.54 21.9 7.73001 19.98 6.47001L13.99 2.54001C12.91 1.82001 11.13 1.82001 10.05 2.53001Z M5.63012 13.08L5.62012 17.77C5.62012 19.04 6.60012 20.4 7.80012 20.8L10.9901 21.86C11.5401 22.04 12.4501 22.04 13.0101 21.86L16.2001 20.8C17.4001 20.4 18.3801 19.04 18.3801 17.77V13.13 M21.3999 15V9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="flex-1 ml-3 whitespace-nowrap">Lecturers</span>
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                        </svg>
                    </div>
                    <ul class="space-y-2 font-medium pl-10" x-show="open">
                        <li><a href="/register" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100">Create Lecturers</a></li>
                        <li><a href="/users/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('users/*') ? 'bg-sky-100 text-sky-500' : ''}}">View All Lecturers</a></li>
                    </ul>
                </li>
                <li x-data="{ open: false }">
                    <div x-on:click="open = ! open" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-sky-100 hover:text-sky-500 dark:hover:bg-sky-700 group">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-500 dark:group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1601 10.87C12.0601 10.86 11.9401 10.86 11.8301 10.87C9.45006 10.79 7.56006 8.84 7.56006 6.44C7.56006 3.99 9.54006 2 12.0001 2C14.4501 2 16.4401 3.99 16.4401 6.44C16.4301 8.84 14.5401 10.79 12.1601 10.87Z M7.15997 14.56C4.73997 16.18 4.73997 18.82 7.15997 20.43C9.90997 22.27 14.42 22.27 17.17 20.43C19.59 18.81 19.59 16.17 17.17 14.56C14.43 12.73 9.91997 12.73 7.15997 14.56Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="flex-1 ml-3 whitespace-nowrap">Students</span>
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                        </svg>
                    </div>
                    <ul class="space-y-2 font-medium pl-10" x-show="open">
                        <li><a href="/students/create" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('students/create') ? 'bg-sky-100 text-sky-500' : ''}}">Create Students</a></li>
                        <li><a href="/students/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('students/manage') ? 'bg-sky-100 text-sky-500' : ''}}">View All Students</a></li>
                    </ul>
                </li>
                <li x-data="{ open: false }">
                    <div x-on:click="open = ! open" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-sky-100 hover:text-sky-500 dark:hover:bg-sky-700 group">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-500 dark:group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.5 18V7C3.5 3 4.5 2 8.5 2H15.5C19.5 2 20.5 3 20.5 7V17C20.5 17.14 20.5 17.28 20.49 17.42 M6.35 15H20.5V18.5C20.5 20.43 18.93 22 17 22H7C5.07 22 3.5 20.43 3.5 18.5V17.85C3.5 16.28 4.78 15 6.35 15Z M8 10.5H13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="flex-1 ml-3 whitespace-nowrap">Courses</span>
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                        </svg>
                    </div>
                    <ul class="space-y-2 font-medium pl-10" x-show="open">
                        <li><a href="/courses/create" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('courses/create') ? 'bg-sky-100 text-sky-500' : ''}}">Create Courses</a></li>
                        <li><a href="/courses/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('courses/manage') ? 'bg-sky-100 text-sky-500' : ''}}">View All Courses</a></li>
                    </ul>
                </li>
                @else
                <li>
                    <a href="/students" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-sky-100 hover:text-sky-500 dark:hover:bg-sky-700 group">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-500 dark:group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1601 10.87C12.0601 10.86 11.9401 10.86 11.8301 10.87C9.45006 10.79 7.56006 8.84 7.56006 6.44C7.56006 3.99 9.54006 2 12.0001 2C14.4501 2 16.4401 3.99 16.4401 6.44C16.4301 8.84 14.5401 10.79 12.1601 10.87Z M7.15997 14.56C4.73997 16.18 4.73997 18.82 7.15997 20.43C9.90997 22.27 14.42 22.27 17.17 20.43C19.59 18.81 19.59 16.17 17.17 14.56C14.43 12.73 9.91997 12.73 7.15997 14.56Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="ml-3">Students</span>
                    </a>
                </li>
                <li x-data="{ open: false }">
                    <div x-on:click="open = ! open" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-sky-100 hover:text-sky-500 dark:hover:bg-sky-700 group">
                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-500 dark:group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 2V5 M16 2V5 M3.5 9.08997H20.5 M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z M15.6947 13.7H15.7037 M15.6947 16.7H15.7037 M11.9955 13.7H12.0045 M11.9955 16.7H12.0045 M8.29431 13.7H8.30329 M8.29431 16.7H8.30329" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>


                        <span class="flex-1 ml-3 whitespace-nowrap">Attendance</span>
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                        </svg>
                    </div>
                    <ul class="space-y-2 font-medium pl-10" x-show="open">
                        <li><a href="/courses/create" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100">Take Attendance</a></li>
                        <li><a href="/courses/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100">View Class Attendance</a></li>
                        <li><a href="/courses/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100">View Students Attendance</a></li>
                        <li><a href="/courses/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100">Overall Students Attendance</a></li>
                    </ul>
                </li>
                @endunless
            </ul>
            <div class="absolute inset-x-0 bottom-16 font-medium">
                <div class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-sky-100 hover:text-sky-500 dark:hover:bg-sky-700 group">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-500 dark:group-hover:text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.8999 7.55999C9.2099 3.95999 11.0599 2.48999 15.1099 2.48999H15.2399C19.7099 2.48999 21.4999 4.27999 21.4999 8.74999V15.27C21.4999 19.74 19.7099 21.53 15.2399 21.53H15.1099C11.0899 21.53 9.2399 20.08 8.9099 16.54" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M15.0001 12H3.62012" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5.85 8.6499L2.5 11.9999L5.85 15.3499" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <form action="/logout" method="POST">
                        @csrf
                        <button class="flex-1 ml-3 whitespace-nowrap">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </aside>
    <main class="p-4 sm:ml-64 bg-gray-100">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            {{$slot}}
        </div>
    </main>
    <x-flash-message />
</body>

</html>