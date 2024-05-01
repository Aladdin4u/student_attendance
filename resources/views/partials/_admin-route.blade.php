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
        <li><a href="/users/create" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('users/create') ? 'bg-sky-100 text-sky-500' : ''}}">Create Lecturers</a></li>
        <li><a href="/users/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('users/manage') ? 'bg-sky-100 text-sky-500' : ''}}">View All Lecturers</a></li>
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
        <li><a href="/students/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('students/manage') ? 'bg-sky-100 text-sky-500' : ''}} {{ request()->is('students/manage') ? 'bg-sky-100 text-sky-500' : ''}}">View All Students</a></li>
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
<li x-data="{ 
                data: {{ $section }},
                open: false, 
                open(){
                this.open = true
            }, 
                close(){
                this.open = false
            }, 
        }" x-init=" data ? open() : close() ">
    <div x-on:click="open = ! open" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-sky-100 hover:text-sky-500 dark:hover:bg-sky-700 group">
        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-500 dark:group-hover:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path>
        </svg>

        <span class="flex-1 ml-3 whitespace-nowrap">Academic Session</span>
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
        </svg>
    </div>
    <ul class="space-y-2 font-medium pl-10" x-show="open">
        <li><a href="/sections/create" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('sections/create') ? 'bg-sky-100 text-sky-500' : ''}}">Create Academic Session</a></li>
        <li><a href="/sections/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('sections/manage') ? 'bg-sky-100 text-sky-500' : ''}} {{ request()->is('sections/manage') ? 'bg-sky-100 text-sky-500' : ''}}">View All Academic Session</a></li>
    </ul>
</li>
<li x-data="{ 
                data: {{ $faculty }},
                open: false, 
                open(){
                this.open = true
            }, 
                close(){
                this.open = false
            }, 
        }" x-init=" data ? open() : close() ">
    <div x-on:click="open = ! open" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-sky-100 hover:text-sky-500 dark:hover:bg-sky-700 group">
        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-500 dark:group-hover:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path>
        </svg>

        <span class="flex-1 ml-3 whitespace-nowrap">Faculty</span>
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
        </svg>
    </div>
    <ul class="space-y-2 font-medium pl-10" x-show="open">
        <li><a href="/faculties/create" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('faculties/create') ? 'bg-sky-100 text-sky-500' : ''}}">Create Faculty</a></li>
        <li><a href="/faculties/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('faculties/manage') ? 'bg-sky-100 text-sky-500' : ''}} {{ request()->is('faculties/manage') ? 'bg-sky-100 text-sky-500' : ''}}">View All Faculty</a></li>
    </ul>
</li>
<li x-data="{ 
                data: {{ $level }},
                open: false, 
                open(){
                this.open = true
            }, 
                close(){
                this.open = false
            }, 
        }" x-init=" data ? open() : close() ">
    <div x-on:click="open = ! open" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-sky-100 hover:text-sky-500 dark:hover:bg-sky-700 group">
        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-500 dark:group-hover:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path>
        </svg>

        <span class="flex-1 ml-3 whitespace-nowrap">Level</span>
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
        </svg>
    </div>
    <ul class="space-y-2 font-medium pl-10" x-show="open">
        <li><a href="/levels/create" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('levels/create') ? 'bg-sky-100 text-sky-500' : ''}}">Create Level</a></li>
        <li><a href="/levels/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('levels/manage') ? 'bg-sky-100 text-sky-500' : ''}} {{ request()->is('levels/manage') ? 'bg-sky-100 text-sky-500' : ''}}">View All Level</a></li>
    </ul>
</li>
<li x-data="{ 
                data: {{ $department }},
                open: false, 
                open(){
                this.open = true
            }, 
                close(){
                this.open = false
            }, 
        }" x-init=" data ? open() : close() ">
    <div x-on:click="open = ! open" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-sky-100 hover:text-sky-500 dark:hover:bg-sky-700 group">
        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-sky-500 dark:group-hover:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path>
        </svg>

        <span class="flex-1 ml-3 whitespace-nowrap">Department</span>
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
        </svg>
    </div>
    <ul class="space-y-2 font-medium pl-10" x-show="open">
        <li><a href="/departments/create" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('departments/create') ? 'bg-sky-100 text-sky-500' : ''}}">Create Department</a></li>
        <li><a href="/departments/manage" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:text-sky-500 hover:bg-sky-100 {{ request()->is('departments/manage') ? 'bg-sky-100 text-sky-500' : ''}} {{ request()->is('departments/manage') ? 'bg-sky-100 text-sky-500' : ''}}">View All Department</a></li>
    </ul>
</li>