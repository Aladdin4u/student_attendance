<li x-data="{ 
                data: {{ $user}},
                open: false, 
                open(){
                this.open = true
            }, 
                close(){
                this.open = false
            }, 
        }" x-init=" data ? open() : close() ">
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
        <li><a href="/lecturers/create" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100">Create Lecturers</a></li>
        <li><a href="/users/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('users/*') ? 'bg-sky-100 text-sky-500' : ''}}">View All Lecturers</a></li>
    </ul>
</li>
<li x-data="{ 
                data: {{$student}},
                open: false, 
                open(){
                this.open = true
            }, 
                close(){
                this.open = false
            }, 
        }" x-init=" data ? open(): close() ">
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
        <li><a href="/students/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('students/manage') ? 'bg-sky-100 text-sky-500' : ''}} {{ request()->is('students/*') ? 'bg-sky-100 text-sky-500' : ''}}">View All Students</a></li>
    </ul>
</li>
<li x-data="{ 
                data: {{ $course }},
                open: false, 
                open(){
                this.open = true
            }, 
                close(){
                this.open = false
            }, 
        }" x-init=" data ? open() : close() ">
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
        <li><a href="/courses/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('courses/manage') ? 'bg-sky-100 text-sky-500' : ''}} {{ request()->is('courses/manage') ? 'bg-sky-100 text-sky-500' : ''}}">View All Courses</a></li>
    </ul>
</li>