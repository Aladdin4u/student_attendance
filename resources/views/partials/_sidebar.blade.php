@php
$dashboardLink = (auth()->user()->role == 'admin') ? '/admin' : ((auth()->user()->role == 'lecturer') ? '/lecturer' : '/');
$user = request()->is('users*') ? 1 : 0;
$student = request()->is('students*')? 1 : 0;
$lectures = request()->is('lectures*')? 1 : 0;
$faculty = request()->is('faculties*')? 1 : 0;
$level = request()->is('levels*')? 1 : 0;
$department = request()->is('departments*')? 1 : 0;
$course = request()->is('courses*') ? 1 : 0;
$section = request()->is('sections*') ? 1 : 0;
$attendances = request()->is('attendances*') ? 1 : 0;
@endphp
<aside id="logo-sidebar" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{$dashboardLink}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-sky-100 hover:text-sky-500 dark:hover:bg-sky-700 group {{ request()->is('/') ? 'bg-sky-100 text-sky-500' : ''}}">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-500 dark:group-hover:text-white {{ request()->is('/') ? 'text-sky-500' : ''}}" fill="none" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            @unless(auth()->user()->role != "admin")
            @include('partials._admin-route')
            @elseif (auth()->user()->role == "lecturer")
            @include('partials._lecturer-route')
            @else
            @include('partials._student-route')
            @endunless
        </ul>
        <div class="absolute inset-x-0 bottom-32 md:bottom-16">
            <div class="font-medium px-3">
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
    </div>
</aside>