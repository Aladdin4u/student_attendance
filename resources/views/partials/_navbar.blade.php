@php
$dashboardLink = (auth()->user()->role == 'admin') ? '/admin' : ((auth()->user()->role == 'lecturer') ? '/lecturer' : '/');
@endphp
<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <div x-data="{ open: false }" class="sm:hidden">
                    <button x-on:click="open = !open" data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <div x-show="open" class="absolute left-0 mt-2.5 w-64 h-screen bg-white">
                        @include("partials._sidebar")
                    </div>
                </div>
                <a href="{{$dashboardLink}}" class="flex ml-2 md:mr-24">
                    <svg class="w-8 h-8 flex-shrink-0 w-6 h-6 text-[#15ACD9] transition duration-75 mr-3" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path>
                    </svg>
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">ClassMonitor</span>
                </a>
            </div>
            <div class="w-full flex items-center justify-end md:justify-between px-3">
                <form class="hidden md:block">
                    <label for="search" class="text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative w-80">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="search" class="w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6  pl-10" placeholder="Search...">

                        <div id="display-search" class="bg-white absolute w-80 top-10 left-1/2 transform -translate-x-1/2 px-3 py-2 z-50 rounded-lg shadow-sm hidden">
                            <ul id="results" class="w-full space-y-2 divide-y divide-gray-600">
                            </ul>
                        </div>
                    </div>
                </form>
                <div class="flex items-center">
                    <img class="w-8 h-8 rounded-full" src={{asset("avatar.png")}} alt="user photo">
                    <span class="ml-3 text-black">{{auth()->user()->contacts->firstName}}</span>
                </div>
            </div>
        </div>
    </div>
</nav>